<?php

namespace App\Repositories;

/**
 * EventJoin Model Repository
 */
class EventJoinRepository extends CommonRepository {

    public function findInfoByEventIdAndCustomerId($eventId, $customerId) {

        $map['event_join.customer_id'] = $customerId;
        $map['event_join.event_id'] = $eventId;

        $model = $this->model;
        $info = $model->leftJoin('customer as c', 'c.customer_id', '=', 'event_join.customer_id')
            ->where($map)
            ->get(["event_join.*", "c.headimgurl", "c.nickname"])
            ->first();
        return $info;

    }

    public function getJoinEventCount($customerId) {

        $map[] = ["customer_id", "=", $customerId];
        $count = $this->getByWhere($map)
            ->count();
        return $count;

    }

    public function getTotalJoinEventCount($eventId) {

        $map["event_id"] = $eventId;

        $count = $this->model
            ->whereIn("status", array(
                config("enumerations.EVENT_JOIN_STATUS.WAITING_CHECK"),
                config("enumerations.EVENT_JOIN_STATUS.WAITING_PAY"),
                config("enumerations.EVENT_JOIN_STATUS.END_PAY")
            ))
            ->where($map)
            ->count();

        return $count;

    }

    public function getAccessJoinEventCount($customerId) {

        $map[] = ["customer_id", "=", $customerId];
        $map[] = ["status", "!=", config("enumerations.EVENT_JOIN_STATUS.REJECT")];
        $map[] = ["status", "!=", config("enumerations.EVENT_JOIN_STATUS.WAITING_CHECK")];
        $count = $this->getByWhere($map)
            ->count();
        return $count;

    }

    public function getJoinEventList($customerId) {

        $model = $this->model;
        $list = $model->leftJoin('event as e', 'e.event_id', '=', 'event_join.event_id')
            ->where("event_join.customer_id", $customerId)
            ->orderBy('created_at', 'desc')
            ->get(["event_join.*", "e.title", "e.title_image"
                , "e.second_title", "e.open_time", "e.end_time"]);
        return $list;

    }

    public function findByEventIdAndCustomerId($eventId, $customerId) {
        $map[] = ["event_id", "=", $eventId];
        $map[] = ["customer_id", "=", $customerId];
        $info = $this->getByWhere($map)
            ->first();
        return $info;
    }

    public function getJoinCountByCondition($type, $eventId) {

        if($type == "waiting") {
            $statusArray = array(config("enumerations.EVENT_JOIN_STATUS.WAITING_CHECK"));
        } else if($type == "access") {
            $statusArray = array(
                config("enumerations.EVENT_JOIN_STATUS.WAITING_PAY"),
                config("enumerations.EVENT_JOIN_STATUS.END_PAY"),);
        } else if($type == "reject") {
            $statusArray = array(config("enumerations.EVENT_JOIN_STATUS.REJECT"));
        } else if($type == "no") {
            $statusArray = array(config("enumerations.EVENT_JOIN_STATUS.REFUND"),
                config("enumerations.EVENT_JOIN_STATUS.CANCEL"),);
        }

        $map["e.event_id"] = $eventId;

        $count = $this->model
            ->leftJoin('event as e','e.event_id','=','event_join.event_id')
            ->where($map)
            ->whereIn("event_join.status", $statusArray)
            ->count();

        return $count;

    }

    public function getJoinListByCondition($type, $eventId) {

        if($type == "waiting") {
            $statusArray = array(config("enumerations.EVENT_JOIN_STATUS.WAITING_CHECK"));
        } else if($type == "access") {
            $statusArray = array(
                config("enumerations.EVENT_JOIN_STATUS.WAITING_PAY"),
                config("enumerations.EVENT_JOIN_STATUS.END_PAY"),);
        } else if($type == "reject") {
            $statusArray = array(config("enumerations.EVENT_JOIN_STATUS.REJECT"));
        } else if($type == "no") {
            $statusArray = array(config("enumerations.EVENT_JOIN_STATUS.REFUND"),
                config("enumerations.EVENT_JOIN_STATUS.CANCEL"),);
        }

        $map["e.event_id"] = $eventId;

        $list = $this->model
            ->leftJoin('customer as c','c.customer_id','=','event_join.customer_id')
            ->leftJoin('event as e','e.event_id','=','event_join.event_id')
            ->where($map)
            ->whereIn("event_join.status", $statusArray)
            ->get(["c.*","e.question_one","e.question_two","e.question_three","event_join.reject_reason",
                    "event_join.join_id","event_join.created_at as join_time","event_join.status as join_status",
                    "event_join.answer_one","event_join.answer_two","event_join.answer_three"]);

        return $list;

    }

    public function getNotCommentCount($customerId) {

        $map["event_join.customer_id"] = $customerId;
        $map["event_join.status"] = config("enumerations.EVENT_JOIN_STATUS.END_SIGN");
        $map["e.status"] = config("enumerations.EVENT_STATUS.END");

        $count = $this->model
            ->leftJoin('event as e','e.event_id','=','event_join.event_id')
            ->where($map)
            ->count();

        return $count;

    }

    public function getNotSignListByEventId($eventId) {

        $map["event_id"] = $eventId;
        $map["status"] = config("enumerations.EVENT_JOIN_STATUS.END_PAY");

        $list = $this->model
            ->where($map)
            ->get();

        return $list;
    }

    public function getEventJoinList($id) {
        $map['event_join.event_id'] = $id;
        $map['event_join.status'] = config('enumerations.EVENT_JOIN_STATUS.END_PAY');

        $list = $this->model
            ->leftJoin('customer as c','c.customer_id','=','event_join.customer_id')
            ->leftJoin('event_sign as es','es.event_id','=','event_join.event_id')
            ->where($map)
            ->orderBy('event_join.created_at','desc')
            ->get(['event_join.join_id','c.nickname','c.mobile','event_join.answer_one','event_join.answer_two','event_join.answer_three',
                'es.created_at AS sign_time','event_join.created_at AS join_time']);

        return $list;
    }

    public function findPayListByEventId($eventId) {

        $map["e.event_id"] = $eventId;

        $list = $this->model
            ->leftJoin('event as e', 'e.event_id', '=', 'event_join.event_id')
            ->leftJoin('pay as p', 'p.pay_id', '=', 'event_join.pay_id')
            ->where($map)
            ->get(['event_join.join_id','p.*']);
        return $list;

    }

}
