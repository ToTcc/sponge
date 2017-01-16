<?php

namespace App\Http\Controllers\Frontend;

use App\Facades\ActivityCommentRepository;
use App\Facades\ActivityJoinRepository;
use App\Facades\ActivityRepository;
use App\Facades\ActivitySignRepository;
use App\Facades\ApplyRepository;
use App\Facades\CustomerRepository;
use App\Facades\EventCommentRepository;
use App\Facades\EventSignRepository;
use App\Facades\MovieLikeRepository;
use App\Facades\MovieRepository;
use App\Facades\PayRepository;
use App\Facades\ScoreRecordRepository;
use App\Facades\ScoreRuleRepository;
use App\Models\Movie;
use App\Models\MovieLike;
use App\Facades\EventJoinRepository;
use App\Facades\EventRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserCenterController extends Controller
{

    protected $currentCustomerId;

    public function __construct() {

    }

    public function myLike(Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $customer = CustomerRepository::find($this->currentCustomerId);
        $likeCount = MovieLikeRepository::getLikeMovieCount($this->currentCustomerId);
        $likeList = MovieLikeRepository::findLikeMovieList($this->currentCustomerId, 1);

        foreach($likeList as &$item) {
            $item["info"] = unserialize($item["info"]);
        }

        if($customer["black"] == 1) {
            $data["day_gap"] = calculateDateGap(getCurrentDate(), $customer["unlock_time"]);
        }

        $data["info"] = collect($customer)->all();
        $data["list"] = collect($likeList)->all();
        $data["total_counts"] = collect($likeCount)->first();

        return view('frontend.myLike', compact('data'));
    }

    public function myLikeForPage(Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $pageNum = $request->input("pageNum");

        $likeList = MovieLikeRepository::findLikeMovieList($this->currentCustomerId, $pageNum);

        foreach($likeList as &$item){
            $item["info"] = unserialize($item["info"]);
        }

        return response()->json($likeList);

    }

    public function myPay(Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $customer = CustomerRepository::find($this->currentCustomerId);
        $payCount = ActivityJoinRepository::getPayCount($this->currentCustomerId);
        $payList = ActivityJoinRepository::findPayList($this->currentCustomerId, 1);

        foreach($payList as &$item) {
            $item["info"] = unserialize($item["info"]);
            $time = date('Y.m.d', strtotime($item["show_time"]));
            $time .= " ".getWeekByDate($item["show_time"])." ";
            $time .= date('H:i', strtotime($item["show_time"]));
            $item["time"] = $time;

            $now = date('Y-m-d H:i:s', strtotime("-1 hour"));
            if($now < $item["show_time"]) {
                $item["is_open"] = false;
            } else {
                $item["is_open"] = true;
            }
        }

        if($customer["black"] == 1) {
            $data["day_gap"] = calculateDateGap(getCurrentDate(), $customer["unlock_time"]);
        }

        $data["info"] = collect($customer)->all();
        $data["list"] = collect($payList)->all();
        $data["total_counts"] = collect($payCount)->first();

        return view('frontend.myPay', compact('data'));
    }

    public function myPayForPage(Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $pageNum = $request->input("pageNum");

        $payList = ActivityJoinRepository::findPayList($this->currentCustomerId, $pageNum);

        foreach($payList as &$item){
            $item["info"] = unserialize($item["info"]);
            $item["time"] = getWeekByDate($item["show_time"]);
        }

        return response()->json($payList);

    }

    public function myInfo(Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $customer = CustomerRepository::find($this->currentCustomerId);

        $data["info"] = $customer;

        return view('frontend.myInfo', compact('data'));

    }

    public function updateInfo(Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $customer = CustomerRepository::find($this->currentCustomerId);

        $data["nickname"] = $request->input("nickname");
        $data["sex"] = $request->input("sex");
        $data["job"] = $request->input("job");
        $data["year_type"] = $request->input("yearType");
        $data["mobile"] = $request->input("mobile");
        $data["valid"] = 1;

        CustomerRepository::saveById($customer["customer_id"], $data);

        $returnData["code"] = 200;
        return response()->json($returnData);

    }

    public function myCreateEvent(Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $customer = CustomerRepository::find($this->currentCustomerId);

        if($customer["available"] == config("enumerations.CUSTOMER_AVAILABLE.NORMAL")) {

            $applyList = ApplyRepository::getApplyList($this->currentCustomerId);
            $data["apply_list"] = $applyList;
            $data["apply_count"] = ApplyRepository::getApplyCount($this->currentCustomerId);

            $data["total_counts"] = 0;

        } else {

            $count = EventRepository::getMyCreateEventCount($this->currentCustomerId);
            $list = EventRepository::getMyCreateEventList($this->currentCustomerId);

            foreach($list as &$item) {
                $time = date('Y.m.d', strtotime($item["open_time"]));
                $time .= " ".getWeekByDate($item["open_time"])." ";
                $time .= date('H:i', strtotime($item["open_time"]))
                    . "-" . date('H:i', strtotime($item["end_time"]));
                $item["time"] = $time;

                $item["join_number"] = EventJoinRepository::getTotalJoinEventCount($item["event_id"]);
            }

            $data["list"] = collect($list)->all();
            $data["total_counts"] = collect($count)->first();

        }

        if($customer["black"] == 1) {
            $data["day_gap"] = calculateDateGap(getCurrentDate(), $customer["unlock_time"]);
        }

        $data["info"] = collect($customer)->all();

        return view('frontend.myCreateEvent', compact('data'));

    }

    public function rejectEventJoinPage($joinId, Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $eventJoin = EventJoinRepository::find($joinId);

        if(isNullOrEmpty($eventJoin)) {
            return redirect()->route("frontend.userCenter.myCreateEvent");
        }

        $event = EventRepository::find($eventJoin["event_id"]);

        if($event["customer_id"] != $this->currentCustomerId) {
            return redirect()->route("frontend.userCenter.myCreateEvent");
        }

        if($eventJoin["status"]
            != config("enumerations.EVENT_JOIN_STATUS.WAITING_CHECK")) {
            return redirect()->route("frontend.userCenter.myCreateEvent");
        }

        $data["join"] = $eventJoin;

        return view('frontend.rejectEventJoinPage', compact('data'));

    }

    public function rejectEventJoin(Request $request) {

        $data["code"] = 200;
        $data["msg"] = "拒绝成功";

        $this->currentCustomerId = $request->session()->get("customerId");

        $joinId = $request->input("joinId");

        $eventJoin = EventJoinRepository::find($joinId);

        if(isNullOrEmpty($eventJoin)) {
            $data["code"] = -1;
            $data["msg"] = "未找到报名记录，请重新再试";
            return response()->json($data);
        }

        $event = EventRepository::find($eventJoin["event_id"]);

        if($event["customer_id"] != $this->currentCustomerId) {
            $data["code"] = -2;
            $data["msg"] = "对不起，您无权限操作该记录";
            return response()->json($data);
        }

        if($eventJoin["status"]
            != config("enumerations.EVENT_JOIN_STATUS.WAITING_CHECK")) {
            $data["code"] = -3;
            $data["msg"] = "对不起，该条记录当前不可审核，请重新再试";
            return response()->json($data);
        }

        $eventJoinData["reject_reason"] = $request->input("reason");
        $eventJoinData["status"] = config("enumerations.EVENT_JOIN_STATUS.REJECT");
        EventJoinRepository::saveById($eventJoin["join_id"], $eventJoinData);

        return response()->json($data);

    }

    public function accessEventJoin(Request $request) {

        $data["code"] = 200;
        $data["msg"] = "审核通过";

        $this->currentCustomerId = $request->session()->get("customerId");

        $joinId = $request->input("joinId");

        $eventJoin = EventJoinRepository::find($joinId);

        if(isNullOrEmpty($eventJoin)) {
            $data["code"] = -1;
            $data["msg"] = "未找到报名记录，请重新再试";
            return response()->json($data);
        }

        $event = EventRepository::find($eventJoin["event_id"]);

        if($event["customer_id"] != $this->currentCustomerId) {
            $data["code"] = -2;
            $data["msg"] = "对不起，您无权限操作该记录";
            return response()->json($data);
        }

        if($eventJoin["status"]
            != config("enumerations.EVENT_JOIN_STATUS.WAITING_CHECK")) {
            $data["code"] = -3;
            $data["msg"] = "对不起，该条记录当前不可审核，请重新再试";
            return response()->json($data);
        }

        if($event["event_type"] == config("enumerations.EVENT_TYPE.CASH")) {
            $eventJoinData["status"] = config("enumerations.EVENT_JOIN_STATUS.WAITING_PAY");
        } else {
            $eventJoinData["status"] = config("enumerations.EVENT_JOIN_STATUS.END_PAY");
            $eventJoinData["pay_id"] = 0;
        }

        EventJoinRepository::saveById($eventJoin["join_id"], $eventJoinData);

        return response()->json($data);

    }

    public function viewMyCreateEventDetail($id, Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $event = EventRepository::find($id);

        if($event["customer_id"] != $this->currentCustomerId) {
            return redirect()->route("frontend.userCenter.myCreateEvent");
        }

        $type = isNullOrEmpty($request->input("type")) ? "waiting" : $request->input("type");

        $list = EventJoinRepository::getJoinListByCondition($type, $id);

        foreach($list as &$item) {
            $item["hour_gap"] = calculateHourGapByDate($item["join_time"], date("Y-m-d H:i:s"));
        }

        $waitingCount = EventJoinRepository::getJoinCountByCondition("waiting", $id);
        $accessCount = EventJoinRepository::getJoinCountByCondition("access", $id);
        $rejectCount = EventJoinRepository::getJoinCountByCondition("reject", $id);
        $noCount = EventJoinRepository::getJoinCountByCondition("no", $id);

        $data["waiting_count"] = $waitingCount;
        $data["access_count"] = $accessCount;
        $data["reject_count"] = $rejectCount;
        $data["no_count"] = $noCount;
        $data["event"] = $event;
        $data["list"] = $list;
        $data["type"] = $type;

        return view('frontend.viewMyCreateEventDetail', compact('data'));

    }

    public function viewMyCreateActivityComment($id, Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $customer = CustomerRepository::find($this->currentCustomerId);

        $event = EventRepository::find($id);

        if($event["customer_id"] != $this->currentCustomerId) {
            return redirect()->route("frontend.userCenter.myCreateEvent");
        }

        $commentList = EventCommentRepository::getByWhere(array("event_id"=>$id));
        $averagePoint = EventCommentRepository::getAveragePointByCustomerId($this->currentCustomerId);

        $goodCount = EventCommentRepository::getCountByCustomerIdAndType($this->currentCustomerId, config("enumerations.COMMENT_TYPE.GOOD"));
        $normalCount = EventCommentRepository::getCountByCustomerIdAndType($this->currentCustomerId, config("enumerations.COMMENT_TYPE.NORMAL"));
        $badCount = EventCommentRepository::getCountByCustomerIdAndType($this->currentCustomerId, config("enumerations.COMMENT_TYPE.BAD"));

        $data["good_count"] = $goodCount;
        $data["normal_count"] = $normalCount;
        $data["bad_count"] = $badCount;
        $data["average_point"] = sprintf("%.1f", $averagePoint);
        $data["info"] = collect($customer)->all();
        $data["list"] = $commentList;

        return view('frontend.viewMyCreateActivityComment', compact('data'));

    }

    public function viewRejectReason($id, Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $eventJoin = EventJoinRepository::findByEventIdAndCustomerId($id, $this->currentCustomerId);

        if($eventJoin["status"] != config("enumerations.EVENT_JOIN_STATUS.REJECT")) {
            return redirect()->route("frontend.userCenter.myJoinEventList");
        }

        $data["info"] = $eventJoin;

        return view('frontend.viewRejectReason', compact('data'));

    }

    public function myJoinEventList(Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $customer = CustomerRepository::find($this->currentCustomerId);
        $count = EventJoinRepository::getJoinEventCount($this->currentCustomerId);
        $list = EventJoinRepository::getJoinEventList($this->currentCustomerId);
        $accessCount = EventJoinRepository::getAccessJoinEventCount($this->currentCustomerId);

        foreach($list as &$item) {
            $time = date('Y.m.d', strtotime($item["open_time"]));
            $time .= " ".getWeekByDate($item["open_time"])." ";
            $time .= date('H:i', strtotime($item["open_time"]))
                . "-" . date('H:i', strtotime($item["end_time"]));
            $item["time"] = $time;

            $now = date('Y-m-d H:i:s', strtotime("-1 hour"));
            if($now < $item["open_time"]) {
                $item["is_open"] = false;
            } else {
                $item["is_open"] = true;
            }
        }

        if($customer["black"] == 1) {
            $data["day_gap"] = calculateDateGap(getCurrentDate(), $customer["unlock_time"]);
        }

        $data["info"] = collect($customer)->all();
        $data["list"] = collect($list)->all();
        $data["total_counts"] = collect($count)->first();
        $data["access_counts"] = collect($accessCount)->first();

        return view('frontend.myJoinEventList', compact('data'));

    }

    public function commentActivityPage($id, Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $joinActivity = ActivityJoinRepository::findByActivityIdAndCustomerId($id, $this->currentCustomerId);

        if($joinActivity["status"] != config("enumerations.ACTIVITY_JOIN_STATUS.END_SIGN")) {
            return redirect()->route("frontend.index.search");
        }

        $activity = ActivityRepository::find($joinActivity["join_id"]);
        $movie = MovieRepository::findByMovieId($activity["movie_id"]);

        $movie["info"] = unserialize($movie["info"]);

        $data["id"] = $id;
        $data["info"] = $movie;
        return view('frontend.commentActivityPage', compact('data'));
    }

    public function commentEventPage($id, Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $joinEvent = EventJoinRepository::findByEventIdAndCustomerId($id, $this->currentCustomerId);

        if($joinEvent["status"] != config("enumerations.EVENT_JOIN_STATUS.END_SIGN")) {
            return redirect()->route("frontend.event.eventList");
        }

        $event = EventRepository::find($id);

        $data["info"] = $event;
        return view('frontend.commentEventPage', compact('data'));
    }

    public function commentActivity(Request $request) {

        $id = $request->input("id");

        $this->currentCustomerId = $request->session()->get("customerId");

        $joinActivity = ActivityJoinRepository::findByActivityIdAndCustomerId($id, $this->currentCustomerId);

        if($joinActivity["status"] != config("enumerations.ACTIVITY_JOIN_STATUS.END_SIGN")) {
            $data["code"] = -1;
            $data["msg"] = "服务器数据不统一，请刷新页面重试";
            return response()->json($data);
        }

        $commentData["activity_point"] = $request->input("activityPoint");
        $commentData["man_point"] = $request->input("manPoint");
        $commentData["full_point"] = $request->input("fullPoint");
        $commentData["content"] = $request->input("content");
        $commentData["point"] = sprintf("%.1f", ($commentData["activity_point"]
                +$commentData["man_point"]+$commentData["full_point"])/3);
        $commentData["activity_id"] = $id;
        $commentData["customer_id"] = $this->currentCustomerId;
        if($commentData["point"] == 5) {
            $commentData["type"] = config("enumerations.COMMENT_TYPE.GOOD");
        } else if($commentData["point"] == 1) {
            $commentData["type"] = config("enumerations.COMMENT_TYPE.BAD");
        } else {
            $commentData["type"] = config("enumerations.COMMENT_TYPE.NORMAL");
        }

        ActivityCommentRepository::create($commentData);

        $joinActivityData["status"] = config("enumerations.ACTIVITY_JOIN_STATUS.END_COMMENT");
        ActivityJoinRepository::saveById($joinActivity["join_id"], $joinActivityData);

        $data["code"] = 200;
        $data["msg"] = "感谢您的评论";
        return response()->json($data);

    }

    public function commentEvent(Request $request) {

        $id = $request->input("id");

        $this->currentCustomerId = $request->session()->get("customerId");

        $joinEvent = EventJoinRepository::findByEventIdAndCustomerId($id, $this->currentCustomerId);

        if($joinEvent["status"] != config("enumerations.EVENT_JOIN_STATUS.END_SIGN")) {
            $data["code"] = -1;
            $data["msg"] = "服务器数据不统一，请刷新页面重试";
            return response()->json($data);
        }

        $commentData["event_point"] = $request->input("eventPoint");
        $commentData["man_point"] = $request->input("manPoint");
        $commentData["full_point"] = $request->input("fullPoint");
        $commentData["content"] = $request->input("content");
        $commentData["point"] = sprintf("%.1f", ($commentData["event_point"]
                +$commentData["man_point"]+$commentData["full_point"])/3);
        $commentData["event_id"] = $id;
        $commentData["customer_id"] = $this->currentCustomerId;
        if($commentData["point"] == 5) {
            $commentData["type"] = config("enumerations.COMMENT_TYPE.GOOD");
        } else if($commentData["point"] == 1) {
            $commentData["type"] = config("enumerations.COMMENT_TYPE.BAD");
        } else {
            $commentData["type"] = config("enumerations.COMMENT_TYPE.NORMAL");
        }

        EventCommentRepository::create($commentData);

        $joinEventData["status"] = config("enumerations.EVENT_JOIN_STATUS.END_COMMENT");
        EventJoinRepository::saveById($joinEvent["join_id"], $joinEventData);

        $data["code"] = 200;
        $data["msg"] = "感谢您的评论";
        return response()->json($data);

    }

    public function applySubmit(Request $request) {

        $data["code"] = 200;
        $data["msg"] = "申请成功，请耐心等待审核";

        $this->currentCustomerId = $request->session()->get("customerId");

        $customer = CustomerRepository::find($this->currentCustomerId);

        //判断是否已经是发起人
        if($customer["available"] != config("enumerations.CUSTOMER_AVAILABLE.NORMAL")) {
            $data["code"] = -1;
            $data["msg"] = "已经是发起人了";
            return response()->json($data);
        }

        //判断是否正在申请中
        $apply = ApplyRepository::getProcessingByCustomerId($this->currentCustomerId);

        if(!isNullOrEmpty($apply)) {
            $data["code"] = -2;
            $data["msg"] = "有正在审核的申请，请耐心等候";
            return response()->json($data);
        }

        //新增申请
        $applyData["customer_id"] = $this->currentCustomerId;
        $applyData["name"] = $request->input("name");
        $applyData["sex"] = $request->input("sex");
        $applyData["job"] = $request->input("job");
        $applyData["age"] = $request->input("age");
        $applyData["mobile"] = $request->input("mobile");
        $applyData["email"] = $request->input("email");
        $applyData["wechat_id"] = $request->input("wechatId");
        $applyData["wechat_nickname"] = $request->input("wechatNickname");
        $applyData["wanted_event"] = $request->input("wantedEvent");
        $applyData["reason"] = $request->input("reason");

        ApplyRepository::create($applyData);

        $customerData["sign"] = $request->input("sign");
        CustomerRepository::saveById($customer["customer_id"], $customerData);

        return response()->json($data);

    }

    /**
     * 申请成为发起人页面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function applyPage(Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $customer = CustomerRepository::find($this->currentCustomerId);

        //判断是否已经是发起人
        if($customer["available"] != config("enumerations.CUSTOMER_AVAILABLE.NORMAL")) {
            return redirect()->route("frontend.userCenter.myLike");
        }

        //判断是否正在申请中
        $apply = ApplyRepository::getProcessingByCustomerId($this->currentCustomerId);

        if(!isNullOrEmpty($apply)) {
            return redirect()->route("frontend.userCenter.myLike");
        }

        return view('frontend.applyPage');

    }

    /**
     * 我的信用记录
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function myScoreRecord(Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $list = ScoreRecordRepository::getValidListByCustomerId($this->currentCustomerId);

        foreach($list as &$item) {

            $item["info"] = unserialize($item["info"]);

            if($item["type"] == 1) {
                $startTime = $item["activity_time"];
            } else {
                $startTime = $item["event_time"];
            }

            $time = date('Y.m.d', strtotime($startTime));
            $time .= " ".getWeekByDate($startTime)." ";
            $time .= date('H:i', strtotime($startTime));
                //. "-" . date('H:i', strtotime($item["end_time"]));
            $item["time"] = $time;

        }

        $customer = CustomerRepository::find($this->currentCustomerId);

        $data["list"] = $list;
        $data["info"] = $customer;

        return view('frontend.myScoreRecord', compact('data'));

    }

    public function activitySignPage($id, Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $data["code"] = 200;
        $data["msg"] = "";
        $url = route('frontend.userCenter.activitySign',['activityId' => $id, 'customerId' => $this->currentCustomerId]);
        $data["url"] = $url;

        $joinEvent = ActivityJoinRepository::findByActivityIdAndCustomerId($id, $this->currentCustomerId);

        if($joinEvent["status"] != config("enumerations.ACTIVITY_JOIN_STATUS.END_PAY")) {
            $data["code"] = -1;
            $data["msg"] = "未找到报名记录或者暂不可签到";
            return view('frontend.activitySignPage', compact('data'));
        }

        $sign = ActivitySignRepository::findByActivityIdAndCustomerId($id, $this->currentCustomerId);

        if(!isNullOrEmpty($sign)) {
            $data["code"] = -2;
            $data["msg"] = "已经签过到了";
            return view('frontend.activitySignPage', compact('data'));
        }

        return view('frontend.activitySignPage', compact('data'));

    }

    public function activitySign(Request $request) {

        $id = $request->input("activityId");
        $customerId = $request->input("customerId");

        $data["code"] = 200;
        $data["msg"] = "";

        $customer = CustomerRepository::find($customerId);

        $data["info"] = $customer;

        $this->currentCustomerId = $request->session()->get("customerId");

        $activity = ActivityRepository::find($id);

        if(!in_array($this->currentCustomerId
            , config("enumerations.ACTIVITY_CUSTOMER_ARRAY"))) {
            $data["code"] = -1;
            $data["msg"] = "未找到发起记录";
            return view('frontend.activitySign', compact('data'));
        }

        $joinActivity = ActivityJoinRepository::findByActivityIdAndCustomerId($id, $customerId);

        if($joinActivity["status"] != config("enumerations.ACTIVITY_JOIN_STATUS.END_PAY")) {
            $data["code"] = -2;
            $data["msg"] = "未找到报名记录或者暂不可签到";
            return view('frontend.activitySign', compact('data'));
        }

        $sign = ActivitySignRepository::findByActivityIdAndCustomerId($id, $customerId);

        if(!isNullOrEmpty($sign)) {
            $data["code"] = -3;
            $data["msg"] = "已经签过到了";
            return view('frontend.activitySign', compact('data'));
        }

        //迟到
        if($activity["show_time"] <= getCurrentTime()) {

            $scoreRule = ScoreRuleRepository::findByCode("ACTIVITY_LATE");

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

        }

        $signData["activity_id"] = $id;
        $signData["customer_id"] = $customerId;

        ActivitySignRepository::create($signData);

        $joinActivityData["status"] = config("enumerations.ACTIVITY_JOIN_STATUS.END_SIGN");
        EventJoinRepository::saveById($joinActivity["join_id"], $joinActivityData);

        return view('frontend.activitySign', compact('data'));

    }

    public function eventSignPage($id, Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $data["code"] = 200;
        $data["msg"] = "";
        $url = route('frontend.userCenter.eventSign',['eventId' => $id, 'customerId' => $this->currentCustomerId]);
        $data["url"] = $url;

        $joinEvent = EventJoinRepository::findByEventIdAndCustomerId($id, $this->currentCustomerId);

        if($joinEvent["status"] != config("enumerations.EVENT_JOIN_STATUS.END_PAY")) {
            $data["code"] = -1;
            $data["msg"] = "未找到报名记录或者暂不可签到";
            return view('frontend.eventSignPage', compact('data'));
        }

        $sign = EventSignRepository::findByEventIdAndCustomerId($id, $this->currentCustomerId);

        if(!isNullOrEmpty($sign)) {
            $data["code"] = -2;
            $data["msg"] = "已经签过到了";
            return view('frontend.eventSignPage', compact('data'));
        }

        return view('frontend.eventSignPage', compact('data'));

    }

    public function eventSign(Request $request) {

        $id = $request->input("eventId");
        $customerId = $request->input("customerId");

        $data["code"] = 200;
        $data["msg"] = "";

        $customer = CustomerRepository::find($customerId);

        $data["info"] = $customer;

        $this->currentCustomerId = $request->session()->get("customerId");

        $event = EventRepository::find($id);

        if($event["customer_id"] != $this->currentCustomerId) {
            $data["code"] = -1;
            $data["msg"] = "未找到发起记录";
            return view('frontend.eventSign', compact('data'));
        }

        $joinEvent = EventJoinRepository::findByEventIdAndCustomerId($id, $customerId);

        if($joinEvent["status"] != config("enumerations.EVENT_JOIN_STATUS.END_PAY")) {
            $data["code"] = -2;
            $data["msg"] = "未找到报名记录或者暂不可签到";
            return view('frontend.eventSign', compact('data'));
        }

        $sign = EventSignRepository::findByEventIdAndCustomerId($id, $customerId);

        if(!isNullOrEmpty($sign)) {
            $data["code"] = -3;
            $data["msg"] = "已经签过到了";
            return view('frontend.eventSign', compact('data'));
        }

        //迟到
        if($event["open_time"] <= getCurrentTime()) {

            $scoreRule = ScoreRuleRepository::findByCode("EVENT_LATE");

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
                    $scoreRecordData["type"] = config("enumerations.SCORE_RECORD_TYPE.EVENT");
                    $scoreRecordData["refer_id"] = $event["event_id"];
                    $scoreRecordData["rule_code"] = "EVENT_LATE";

                    ScoreRecordRepository::create($scoreRecordData);

                }

            }

        }

        $signData["event_id"] = $id;
        $signData["customer_id"] = $customerId;

        EventSignRepository::create($signData);

        $joinEventData["status"] = config("enumerations.EVENT_JOIN_STATUS.END_SIGN");
        EventJoinRepository::saveById($joinEvent["join_id"], $joinEventData);

        return view('frontend.eventSign', compact('data'));

    }

    public function eventJoinSuccess($eventId, Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $event = EventRepository::find($eventId);

        if(isNullOrEmpty($event)) {
            return redirect()->route("frontend.event.eventList");
        }

        $eventJoin = EventJoinRepository::findByEventIdAndCustomerId($eventId, $this->currentCustomerId);

        if(isNullOrEmpty($eventJoin)
            || $eventJoin["status"] != config("enumerations.EVENT_JOIN_STATUS.END_PAY")) {
            return redirect()->route("frontend.event.eventList");
        }

        $time = date('Y.m.d', strtotime($event["open_time"]));
        $time .= " ".getWeekByDate($event["open_time"])." ";
        $time .= date('H:i', strtotime($event["open_time"]))
            . "-" . date('H:i', strtotime($event["end_time"]));
        $event["time"] = $time;

        $data["info"] = $event;

        return view('frontend.eventJoinSuccess', compact('data'));

    }

    public function eventRefund(Request $request) {

        $id = $request->input("id");

        $data["code"] = 200;
        $data["msg"] = "请假成功";

        $this->currentCustomerId = $request->session()->get("customerId");

        $customer = CustomerRepository::find($this->currentCustomerId);

        $event = EventRepository::find($id);

        if(isNullOrEmpty($event)) {
            $data["code"] = -1;
            $data["msg"] = "未找到该活动";
            return response()->json($data);
        }

        $eventJoin = EventJoinRepository::findByEventIdAndCustomerId($id, $this->currentCustomerId);

        if($eventJoin["status"]
            != config("enumerations.EVENT_JOIN_STATUS.END_PAY")) {
            $data["code"] = -2;
            $data["msg"] = "对不起，目前不可请假";
            return response()->json($data);
        }

        $hourGap = calculateHourGapByDate(getCurrentTime(), $event["open_time"]);

        $code = getEventRefundCode($hourGap);

        $scoreRule = ScoreRuleRepository::findByCode($code);

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
                $scoreRecordData["type"] = config("enumerations.SCORE_RECORD_TYPE.EVENT");
                $scoreRecordData["refer_id"] = $event["event_id"];
                $scoreRecordData["rule_code"] = $code;

                ScoreRecordRepository::create($scoreRecordData);

            }

        }

        if($event["event_type"]
            == config("enumerations.EVENT_TYPE.CASH")
            && $scoreRule["refund_rate"] != 0) {

            $pay = PayRepository::find($eventJoin['pay_id']);

            $wechat = app('wechat');
            $refundNo = time().rand(0, 999);
            $result = $wechat->payment->refund($pay['out_trade_no'],$refundNo,$pay['money']*100,
                $pay['money']*$scoreRule["refund_rate"]*100);

            if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS'){

                $eventJoinData["status"] = config("enumerations.EVENT_JOIN_STATUS.REFUND");
                EventJoinRepository::saveById($eventJoin["join_id"], $eventJoinData);

                if($event["status"] == config("enumerations.EVENT_STATUS.FULL")) {
                    $eventData["status"] = config("enumerations.EVENT_STATUS.WAITING_JOIN");
                }
                $eventData["join_number"] = $event["join_number"] - 1;

                EventRepository::saveById($id, $eventData);

            } else {
                $data["code"] = -3;
                $data["msg"] = "退款失败，请重试";
                return response()->json($data);
            }

        } else {

            $eventJoinData["status"] = config("enumerations.EVENT_JOIN_STATUS.REFUND");
            EventJoinRepository::saveById($eventJoin["join_id"], $eventJoinData);

            if($event["status"] == config("enumerations.EVENT_STATUS.FULL")) {
                $eventData["status"] = config("enumerations.EVENT_STATUS.WAITING_JOIN");
            }
            $eventData["join_number"] = $event["join_number"] - 1;

            EventRepository::saveById($id, $eventData);

        }

        return response()->json($data);

    }

    public function eventCancel(Request $request) {

        $id = $request->input("id");

        $data["code"] = 200;
        $data["msg"] = "取消报名成功";

        $this->currentCustomerId = $request->session()->get("customerId");

        $customer = CustomerRepository::find($this->currentCustomerId);

        $event = EventRepository::find($id);

        if(isNullOrEmpty($event)) {
            $data["code"] = -1;
            $data["msg"] = "未找到该活动";
            return response()->json($data);
        }

        $eventJoin = EventJoinRepository::findByEventIdAndCustomerId($id, $this->currentCustomerId);

        if($eventJoin["status"]
            != config("enumerations.EVENT_JOIN_STATUS.WAITING_CHECK")) {
            $data["code"] = -2;
            $data["msg"] = "对不起，目前不可取消报名";
            return response()->json($data);
        }

        $scoreRule = ScoreRuleRepository::findByCode("EVENT_CANCEL_BEFORE_VERIFY");

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
                $scoreRecordData["type"] = config("enumerations.SCORE_RECORD_TYPE.EVENT");
                $scoreRecordData["refer_id"] = $event["event_id"];
                $scoreRecordData["rule_code"] = "EVENT_CANCEL_BEFORE_VERIFY";

                ScoreRecordRepository::create($scoreRecordData);

            }

        }

        $eventJoinData["status"] = config("enumerations.EVENT_JOIN_STATUS.CANCEL");

        EventJoinRepository::saveById($eventJoin["join_id"], $eventJoinData);

        return response()->json($data);

    }

    public function eventQrcode($id, Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $event = EventRepository::find($id);

        if(isNullOrEmpty($event)) {
            return redirect()->route("frontend.event.eventList");
        }

        $data["event_id"] = $event["event_id"];
        $data["url"] = $event["qrcode_image"];

        return view('frontend.eventQrcode', compact('data'));

    }

    public function activityQrcode($id, Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $activity = ActivityRepository::find($id);

        if(isNullOrEmpty($activity)) {
            return redirect()->route("frontend.index.search");
        }

        $data["activity_id"] = $activity["activity_id"];
        $data["url"] = $activity["qrcode_image"];

        return view('frontend.activityQrcode', compact('data'));

    }

}
