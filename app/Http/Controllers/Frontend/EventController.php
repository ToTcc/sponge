<?php

namespace App\Http\Controllers\Frontend;

use App\Facades\ActivityJoinRepository;
use App\Facades\ActivityLeaveRepository;
use App\Facades\ActivityRepository;
use App\Facades\CustomerRepository;
use App\Facades\EventJoinRepository;
use App\Facades\EventRepository;
use App\Facades\MovieLikeRepository;
use App\Facades\MovieRepository;
use App\Facades\PayRepository;
use App\Facades\ScoreRuleRepository;
use App\Facades\SuggestionsRepository;
use App\Models\Movie;
use App\Models\MovieLike;
use App\Facades\ActivityPriceRuleRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class EventController extends Controller
{

    protected $currentCustomerId;

    public function __construct() {

    }

    public function eventList(Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $eventList = EventRepository::findListByPage(1);

        foreach($eventList as &$item) {
            $time = date('m.d', strtotime($item["open_time"]));
            $time .= " ".getWeekByDate($item["open_time"])." ";
            $time .= date('H:i', strtotime($item["open_time"]))
                . "-" . date('H:i', strtotime($item["open_time"]));
            $item["time"] = $time;
        }

        return view('frontend.eventList', compact('eventList'));

    }

    public function eventListForPage(Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $pageNum = $request->input("pageNum");

        $eventList = EventRepository::findListByPage($pageNum);

        foreach($eventList as &$item) {
            $time = date('m.d', strtotime($item["open_time"]));
            $time .= " ".getWeekByDate($item["open_time"])." ";
            $time .= date('H:i', strtotime($item["open_time"]))
                . "-" . date('H:i', strtotime($item["end_time"]));
            $item["time"] = $time;
        }

        return response()->json($eventList);

    }

    public function eventDetail($id, Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $event = EventRepository::findEventDetailById($id);

        if(isNullOrEmpty($event)) {
            return redirect()->route("frontend.event.eventList");
        }

        $event["time"] = convertDateToChinese($event["open_time"]) . " "
            . getWeekByDate($event["open_time"]) . date('H:i', strtotime($event["open_time"]))
            . "-" . date('H:i', strtotime($event["end_time"]));

        $event["note"] = unserialize($event["note"]);
        $event["necessary"] = unserialize($event["necessary"]);

        $eventJoin = EventJoinRepository::findInfoByEventIdAndCustomerId($id, $this->currentCustomerId);

        $data["event"] = $event;
        $data["join"] = $eventJoin;

        return view('frontend.eventDetail', compact('data'));

    }

    public function joinEvent(Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $customer = CustomerRepository::find($this->currentCustomerId);

        if($customer["black"] == 1) {
            $data["code"] = -4;
            $data["msg"] = "对不起，您当前的信用值为0，不可报名";
            return response()->json($data);
        }

        $id = $request->input("id");
        $questionOne = $request->input("questionOne");
        $questionTwo = $request->input("questionTwo");
        $questionThree = $request->input("questionThree");

        $event = EventRepository::findEventDetailById($id);

        if(isNullOrEmpty($event)) {
            $data["code"] = -1;
            $data["msg"] = "活动不存在";
            return response()->json($data);
        }

        $eventJoin = EventJoinRepository::findInfoByEventIdAndCustomerId($id, $this->currentCustomerId);

        if(!isNullOrEmpty($eventJoin)) {
            $data["code"] = -2;
            $data["msg"] = "已经报名过该活动";
            return response()->json($data);
        }

        //判断是否有两次及以上未评价
        $number = EventJoinRepository::getNotCommentCount($this->currentCustomerId);

        if($number >= config("enumerations.LIMIT_COMMENT_NUMBER")) {
            $data["code"] = -3;
            $data["msg"] = "对不起，您有两次活动订单未评价，不可报名";
            return response()->json($data);
        }

        $joinData["event_id"] = $id;
        $joinData["customer_id"] = $this->currentCustomerId;
        $joinData["answer_one"] = $questionOne;
        $joinData["answer_two"] = $questionTwo;
        $joinData["answer_three"] = $questionThree;

        EventJoinRepository::create($joinData);

        $data["code"] = 200;

        return response()->json($data);

    }

    public function joinEventPage($id, Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $event = EventRepository::findEventDetailById($id);

        if(isNullOrEmpty($event)) {
            return redirect()->route("frontend.event.eventList");
        }

        if($event["status"] == config("enumerations.EVENT_STATUS.END")
            || $event["status"] == config("enumerations.EVENT_STATUS.CANCEL")) {
            return redirect()->route("frontend.event.eventList");
        }

        $eventJoin = EventJoinRepository::findInfoByEventIdAndCustomerId($id, $this->currentCustomerId);

        if(!isNullOrEmpty($eventJoin)) {
            return redirect()->route("frontend.event.eventDetail", array("id"=>$id));
        }

        return view('frontend.joinEventPage', compact('event'));

    }

    public function eventCancelPage($id, Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $event = EventRepository::findEventDetailById($id);

        if(isNullOrEmpty($event)) {
            return redirect()->route("frontend.event.eventList");
        }

        $eventJoin = EventJoinRepository::findInfoByEventIdAndCustomerId($id, $this->currentCustomerId);

        if($eventJoin["status"]
            != config("enumerations.EVENT_JOIN_STATUS.WAITING_CHECK")) {
            return redirect()->route("frontend.event.eventDetail", array("id"=>$id));
        }

        $data["event"] = $event;

        return view('frontend.eventCancelPage', compact('data'));

    }

    public function eventLeavePage($id, Request $request) {

        $this->currentCustomerId = $request->session()->get("customerId");

        $event = EventRepository::findEventDetailById($id);

        if(isNullOrEmpty($event)) {
            return redirect()->route("frontend.event.eventList");
        }

        $eventJoin = EventJoinRepository::findInfoByEventIdAndCustomerId($id, $this->currentCustomerId);

        if($eventJoin["status"]
            != config("enumerations.EVENT_JOIN_STATUS.END_PAY")) {
            return redirect()->route("frontend.event.eventDetail", array("id"=>$id));
        }

        $hourGap = calculateHourGapByDate(getCurrentTime(), $event["open_time"]);

        $code = getEventRefundCode($hourGap);

        $scoreRule = ScoreRuleRepository::findByCode($code);

        $data["event"] = $event;
        $data["rule"] = $scoreRule;

        return view('frontend.eventLeavePage', compact('data'));

    }

}
