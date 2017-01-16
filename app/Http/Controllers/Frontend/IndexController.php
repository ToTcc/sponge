<?php

namespace App\Http\Controllers\Frontend;

use App\Facades\ActivityJoinRepository;
use App\Facades\ActivityLeaveRepository;
use App\Facades\ActivityRepository;
use App\Facades\CustomerRepository;
use App\Facades\MovieLikeRepository;
use App\Facades\MovieRepository;
use App\Facades\PayRepository;
use App\Facades\ScoreRecordRepository;
use App\Facades\ScoreRuleRepository;
use App\Facades\SuggestionsRepository;
use App\Models\Movie;
use App\Models\MovieLike;
use App\Facades\ActivityPriceRuleRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class IndexController extends Controller
{

    protected $currentCustomerId;

    public function __construct() {

    }

    public function index(Request $request) {
        $this->currentCustomerId = $request->session()->get("customerId");

        $movieList = MovieRepository::findListByPage(1);

        foreach($movieList as &$movie) {
            $movie["info"] = unserialize($movie["info"]);
            $movieLike = MovieLikeRepository::findByMovieIdAndCustomerId($movie["douban_id"], $this->currentCustomerId);
            $movie["is_liked"] = !isNullOrEmpty($movieLike);
        }

        return view('frontend.search', compact('movieList'));

    }

    public function indexForPage(Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $pageNum = $request->input("pageNum");

        $movieList = MovieRepository::findListByPage($pageNum);

        foreach($movieList as &$movie) {
            $movie["info"] = unserialize($movie["info"]);
            $movieLike = MovieLikeRepository::findByMovieIdAndCustomerId($movie["douban_id"], $this->currentCustomerId);
            $movie["is_liked"] = !isNullOrEmpty($movieLike);
        }

        return response()->json($movieList);

    }

    public function suggestion(Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $customer = CustomerRepository::find($this->currentCustomerId);

        $data["customer"] = $customer;

        return view('frontend.suggestion', compact('data'));

    }

    public function goSuggestion(Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $mobile = $request->input("mobile");
        $email = $request->input("email");
        $content = $request->input("content");
        $nickname = $request->input("nickname");

        $suggestion["customer_id"] = $this->currentCustomerId;
        $suggestion["mobile"] = $mobile;
        $suggestion["description"] = $content;
        $suggestion["wechat_id"] = $nickname;
        $suggestion["email"] = $email;

        SuggestionsRepository::create($suggestion);

        $data["code"] = 200;

        return response()->json($data);

    }

    public function joinSuccess($activityId, Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $activity = ActivityRepository::find($activityId);

        if(isNullOrEmpty($activity)) {
            return redirect()->route("frontend.index.search");
        }

        $activityJoin = ActivityJoinRepository::
            findByActivityIdAndCustomerId($activity["activity_id"], $this->currentCustomerId);

        if(isNullOrEmpty($activityJoin)
            || $activityJoin["status"] != config("enumerations.ACTIVITY_JOIN_STATUS.END_PAY")) {
            return redirect()->route("frontend.index.search");
        }

        $movie = MovieRepository::findMovieById($activity["movie_id"]);

        $activity["info"] = unserialize($movie["info"]);

        $data["activity"] = collect($activity)->all();

        return view('frontend.joinSuccess', compact('data'));

    }

    public function confirmChoose(Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $activityId = $request->input("activityId");
        $activityJoin = ActivityJoinRepository::
            findByActivityIdAndCustomerId($activityId, $this->currentCustomerId);

        $data["code"] = 200;

        if(isNullOrEmpty($activityJoin)
            || $activityJoin["status"] != config("enumerations.ACTIVITY_JOIN_STATUS.WAITING_PAY")) {
            $data["code"] = -1;
            $data["msg"] = "对不起，暂不可报名";
            return response()->json($data);
        }

        $joinData["join_activity"] = $request->input("joinActivity");

        ActivityJoinRepository::saveById($activityJoin["join_id"], $joinData);

        return response()->json($data);

    }

    public function joinActivity(Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $activityId = $request->input("activityId");
        $activity = ActivityRepository::find($activityId);

        $data["code"] = 200;

        if($activity["deadline"] <= getCurrentTime()) {
            $data["code"] = -1;
            $data["msg"] = "对不起，已经超过报名时间";
            return response()->json($data);
        }

        if($activity["join_number"]
            == $activity["upper_limit"]) {
            $data["code"] = -2;
            $data["msg"] = "对不起，报名人数已满";
            return response()->json($data);
        }

        if($activity["status"]
            != config("enumerations.ACTIVITY_STATUS.WAITING_JOIN")) {
            $data["code"] = -3;
            $data["msg"] = "对不起，暂不支持报名";
            return response()->json($data);
        }

        $activityJoin = ActivityJoinRepository::
            findByActivityIdAndCustomerId($activity["activity_id"], $this->currentCustomerId);
        if(isNullOrEmpty($activityJoin)) {
            $joinData["status"] = config("enumerations.ACTIVITY_JOIN_STATUS.WAITING_PAY");
            if($activity["activity_type"] == config("enumerations.ACTIVITY_TYPE.FREE")){
                $joinData["status"] = config("enumerations.ACTIVITY_JOIN_STATUS.END_PAY");
            }
            $joinData["activity_id"] = $activityId;
            $joinData["customer_id"] = $this->currentCustomerId;
            $joinData["join_activity"] = $request->input("joinActivity");

            ActivityJoinRepository::create($joinData);

        }

        return response()->json($data);

    }

    public function movieInfo($movieId, Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $movieInfo = MovieRepository::findMovieById($movieId);

        if(isNullOrEmpty($movieInfo)) {
            return redirect()->route("frontend.index.search");
        }

        $movieInfo["info"] = unserialize($movieInfo["info"]);

        $activity = ActivityRepository::findByMovieId($movieId);

        $data["has_activity"] = collect(!isNullOrEmpty($activity))->first();

        if(isNullOrEmpty($activity)) {
            $likeList = MovieLikeRepository::findAllByMovieId($movieId);
        } else {
            $likeList = MovieLikeRepository::findByMovieId($movieId);
        }

        $data["pay_status"] = collect(0)->first();

        if(!isNullOrEmpty($activity)) {
            $data["activity"] = collect($activity)->all();
            $activityJoin = ActivityJoinRepository::
                findByActivityIdAndCustomerId($activity["activity_id"], $this->currentCustomerId);
            if(!isNullOrEmpty($activityJoin)) {
                $data["pay_status"] = collect($activityJoin["status"])->first();
                $data["customer"] = CustomerRepository::find($this->currentCustomerId);
            }
            $priceList = ActivityPriceRuleRepository::findByActivityId($activity["activity_id"]);
            $data["price_count"] = count($priceList);
            $data["price_list"] = $priceList;
            $data["join_activity"] = $activityJoin["join_activity"];
        }

        $like = MovieLikeRepository::findByMovieIdAndCustomerId($movieId, $this->currentCustomerId);

        $totalPlayCount = ActivityRepository::getTotalMoviePlayCount($movieId);
        $totalJoinCount = ActivityJoinRepository::getTotalMovieJoinCount($movieId);

        $data["total_play_count"] = collect($totalPlayCount)->first();
        $data["total_join_count"] = collect($totalJoinCount)->first();
        $data["status"] = collect($movieInfo["status"])->first();
        $data["is_liked"] = collect(!isNullOrEmpty($like))->first();
        $data["like_count"] = collect($movieInfo["like_count"])->first();
        $data["info"] = collect($movieInfo["info"])->all();
        $data["like_list"] = $likeList;

        return view('frontend.movieInfo', compact('data'));

    }

    public function likeMovie(Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $movieId = $request->input("movieId");

        $movieInfo = MovieRepository::findMovieById($movieId);

        $likeInfo = MovieLikeRepository::findByMovieIdAndCustomerId($movieId, $this->currentCustomerId);

        if(isNullOrEmpty($likeInfo)) {

            $like["movie_id"] = $movieId;
            $like["customer_id"] = $this->currentCustomerId;

            MovieLike::create($like);

            $updateData["like_count"] = $movieInfo["like_count"] + 1;
            MovieRepository::saveById($movieInfo["movie_id"], $updateData);

        }

        $data["code"] = 200;
        return response()->json($data);

    }

    public function addMovie(Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $movieId = $request->input("movieId");

        $movieInfo = MovieRepository::findMovieById($movieId);

        $likeCount = 1;

        if(isNullOrEmpty($movieInfo)) {
            $movie['info'] = serialize(getMovieInfoById($movieId));
            $movie["douban_id"] = $movieId;
            $movie["like_count"] = 1;
            Movie::create($movie);
        } else {
            $updateData["like_count"] = $movieInfo["like_count"] + 1;
            MovieRepository::saveById($movieInfo["movie_id"], $updateData);
            $likeCount = $movieInfo["like_count"];
        }
        $like["movie_id"] = $movieId;
        $like["customer_id"] = $this->currentCustomerId;

        MovieLike::create($like);

        $data["code"] = 200;
        $data["like_count"] = $likeCount;
        return response()->json($data);

    }

    public function getMovieListByPage(Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $q = $request->input("q");
        $pageNum = $request->input("pageNum");

        $data = Redis::get(getDoubanMovieKey($q, ($pageNum-1)*5, 5));

        if(isNullOrEmpty($data)) {
            $data = searchMovieByKeyword($q, ($pageNum-1)*5, 5);
            Redis::set(getDoubanMovieKey($q, ($pageNum-1)*5, 5), serialize($data));
        } else {
            $data = unserialize($data);
        }

        if(isNullOrEmpty($data)) {
            $data = searchMovieByKeyword($q, ($pageNum-1)*5, 5);
            Redis::set(getDoubanMovieKey($q, ($pageNum-1)*5, 5), serialize($data));
        }

        foreach($data["subjects"] as &$item) {
            $movieInfo = getMovieInfoById($item["id"]);
            if(!isNullOrEmpty($movieInfo)) {
                $item["country"] = $movieInfo["countries"][0];
                $item["summary"] = $movieInfo["summary"];
            } else {
                $key = array_search($item, $data["subjects"]);
                if ($key !== false)
                    array_splice($data["subjects"], $key, 1);
            }
            $ownMovie = MovieRepository::findMovieById($item["id"]);
            $item["has_movie"] = !isNullOrEmpty($ownMovie);
            $item["like_count"] = 0;
            if($item["has_movie"]) {
                $item["status"] = getEnumString(config("enumerations.MOVIE_STATUS"), $ownMovie["status"]);
                $item["like_count"] = $ownMovie["like_count"];
                $movieLike = MovieLikeRepository::findByMovieIdAndCustomerId($item["id"], $this->currentCustomerId);
                $item["is_liked"] = !isNullOrEmpty($movieLike);
            }
        }

        return response()->json($data["subjects"]);

    }

    public function movieList($q, Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $data = Redis::get(getDoubanMovieKey($q, 0, 5));

        if(isNullOrEmpty($data)) {
            $data = searchMovieByKeyword($q, 0, 5);
            Redis::set(getDoubanMovieKey($q, 0, 5), serialize($data));
        } else {
            $data = unserialize($data);
        }

        if(isNullOrEmpty($data)) {
            $data = searchMovieByKeyword($q, 0, 5);
            Redis::set(getDoubanMovieKey($q, 0, 5), serialize($data));
        }

        foreach($data["subjects"] as &$item) {
            $movieInfo = getMovieInfoById($item["id"]);
            if(!isNullOrEmpty($movieInfo)) {
                $item["country"] = $movieInfo["countries"][0];
                $item["summary"] = $movieInfo["summary"];
            } else {
                $key = array_search($item, $data["subjects"]);
                if ($key !== false)
                    array_splice($data["subjects"], $key, 1);
            }
            $ownMovie = MovieRepository::findMovieById($item["id"]);
            $item["has_movie"] = !isNullOrEmpty($ownMovie);
            $item["like_count"] = 0;
            if($item["has_movie"]) {
                $item["status"] = getEnumString(config("enumerations.MOVIE_STATUS"), $ownMovie["status"]);
                $item["like_count"] = $ownMovie["like_count"];
                $movieLike = MovieLikeRepository::findByMovieIdAndCustomerId($item["id"], $this->currentCustomerId);
                $item["is_liked"] = !isNullOrEmpty($movieLike);
            }
        }

        $data["q"] = $q;

        return view('frontend.movieList', compact('data'));
    }

    public function activityLeavePage($id, Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $activity = ActivityRepository::find($id);

        if(isNullOrEmpty($activity)) {
            return redirect()->route("frontend.index.search");
        }

        $movie = MovieRepository::findMovieById($activity["movie_id"]);

        $activityJoin = ActivityJoinRepository::findByActivityIdAndCustomerId($id, $this->currentCustomerId);

        if(isNullOrEmpty($activityJoin)
            || $activityJoin["status"] != config("enumerations.ACTIVITY_JOIN_STATUS.END_PAY")) {
            return redirect()->route("frontend.index.search");
        }

        $hourGap = calculateHourGapByDate(getCurrentTime(), $activity["show_time"]);

        $code = getActivityRefundCode($hourGap);

        $scoreRule = ScoreRuleRepository::findByCode($code);

        $movie["info"] = unserialize($movie["info"]);

        $data["activity"] = $activity;
        $data["movie"] = $movie;
        $data["rule"] = $scoreRule;

        return view('frontend.activityLeavePage', compact('data'));

    }

    public function leave($activityId, Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $customer = CustomerRepository::find($this->currentCustomerId);

        $activity = ActivityRepository::find($activityId);

        if(isNullOrEmpty($activity)) {
            $returnData["code"] = -1;
            $returnData["msg"] = "未查到该活动";
            return response()->json($returnData);
        }

        $activityJoin = ActivityJoinRepository::findByActivityIdAndCustomerId($activityId, $this->currentCustomerId);

        if(isNullOrEmpty($activityJoin
            || $activityJoin["status"] != config("enumerations.ACTIVITY_JOIN_STATUS.END_PAY"))) {
            $returnData["code"] = -2;
            $returnData["msg"] = "未查到该活动的报名记录";
            return response()->json($returnData);
        }

        $hourGap = calculateHourGapByDate(getCurrentTime(), $activity["show_time"]);

        $code = getActivityRefundCode($hourGap);

        $scoreRule = ScoreRuleRepository::findByCode($code);

        if($activity["activity_type"]
            == config("enumerations.ACTIVITY_TYPE.CASH")
            && $scoreRule["refund_rate"] != 0) {

            $pay = PayRepository::find($activityJoin['pay_id']);

            $wechat = app('wechat');
            $refundNo = time().rand(0, 999);
            $result = $wechat->payment->refund($pay['out_trade_no'],$refundNo,$pay['money']*100,
                $pay['money']*$scoreRule["refund_rate"]*100);

            $returnData["result"] = $result;

            if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS'){

                if($activity["status"] == config("enumerations.ACTIVITY_STATUS.WAITING_PLAY")) {
                    $activityData["status"] = config("enumerations.ACTIVITY_STATUS.WAITING_JOIN");
                }
                $activityData["join_number"] = $activity["join_number"] - 1;

                ActivityRepository::saveById($activityId, $activityData);

                $activityLeaveData['join_id'] = $activityJoin["join_id"];
                $activityLeaveData['activity_id'] = $activityJoin['activity_id'];
                $activityLeaveData['refund_no'] = $refundNo;

                ActivityLeaveRepository::create($activityLeaveData);

                $activityJoinData["status"] = config("enumerations.ACTIVITY_JOIN_STATUS.REFUND");
                ActivityJoinRepository::saveById($activityJoin["join_id"], $activityJoinData);

                $payData["status"] = config("enumerations.PAY_STATUS.REFUND");
                PayRepository::saveById($activityJoin["pay_id"], $payData);

            } else {
                $data["code"] = -3;
                $data["msg"] = "退款失败，请重试";
                return response()->json($data);
            }

        } else {

            $refundNo = time().rand(0, 999);

            $activityLeaveData['join_id'] = $activityJoin["join_id"];
            $activityLeaveData['activity_id'] = $activityJoin['activity_id'];
            $activityLeaveData['refund_no'] = $refundNo;

            ActivityLeaveRepository::create($activityLeaveData);

            $activityJoinData["status"] = config("enumerations.ACTIVITY_JOIN_STATUS.REFUND");
            ActivityJoinRepository::saveById($activityJoin["join_id"], $activityJoinData);

            if($activity["status"] == config("enumerations.ACTIVITY_STATUS.WAITING_PLAY")) {
                $activityData["status"] = config("enumerations.ACTIVITY_STATUS.WAITING_JOIN");
            }
            $activityData["join_number"] = $activity["join_number"] - 1;

            ActivityRepository::saveById($activityId, $activityData);

        }

        //扣分
        if($scoreRule["score"] != 0) {

            if($customer["score"] > 0) {

                //扣总分
                $customerData["score"] = ($customer["score"] - $scoreRule["score"] > 0)
                    ? ($customer["score"] - $scoreRule["score"]) : 0;

                if($customerData["score"] == 0) {
                    $customerData["black"] = 1;
                    $customerData["unlock_time"] = date("Y-m-d H:i:s", strtotime("+15 day"));
                }

                CustomerRepository::saveById($customer["customer_id"], $customerData);

                //添加扣分记录
                $scoreRecordData["customer_id"] = $customer["customer_id"];
                $scoreRecordData["score"] = $scoreRule["score"];
                $scoreRecordData["type"] = config("enumerations.SCORE_RECORD_TYPE.ACTIVITY");
                $scoreRecordData["refer_id"] = $activity["activity_id"];
                $scoreRecordData["rule_code"] = $scoreRule["code"];

                ScoreRecordRepository::create($scoreRecordData);

            }

        }

        $returnData["code"] = 200;
        return response()->json($returnData);

    }

}
