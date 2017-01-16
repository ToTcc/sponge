<?php

namespace App\Repositories;
use DB;
/**
 * Event Model Repository
 */
class EventRepository extends CommonRepository {

    public function findListByPage($pageNum) {

        $model = $this->model;
        $list = $model->leftJoin('customer as c', 'c.customer_id', '=', 'event.customer_id')
            ->whereNotIn("status", array(
                config("enumerations.EVENT_STATUS.WAITING_VERIFY"),
                config("enumerations.EVENT_STATUS.CANCEL")
            ))
            ->orderBy('status', 'asc')
            ->orderBy('open_time', 'asc')
            ->forPage($pageNum, 10)
            ->get(['event.*', 'c.nickname']);
        return $list;
    }

    public function findEventDetailById($eventId) {
        $model = $this->model;
        $info = $model->leftJoin('customer as c', 'c.customer_id', '=', 'event.customer_id')
            ->where("event.event_id", $eventId)
            ->get(['event.*', 'c.nickname', 'c.headimgurl', 'c.sign'])
            ->first();
        return $info;
    }

    public function getMyCreateEventCount($customerId) {

        $map[] = ["customer_id", "=", $customerId];
        $count = $this->getByWhere($map)
            ->count();
        return $count;

    }

    public function getMyCreateEventList($customerId) {

        $model = $this->model;
        $list = $model
            ->where("customer_id", $customerId)
            ->orderBy('created_at', 'asc')
            ->get();
        return $list;

    }

    public function getValidList() {

        $map["status"] = config("enumerations.EVENT_STATUS.WAITING_JOIN");
        $list = $this->model
            ->where($map)
            ->get();
        return $list;

    }

    public function getWaitingEndList() {

        $list = $this->model
            ->whereIn("status", array(
                config("enumerations.EVENT_STATUS.FULL"),
                config("enumerations.EVENT_STATUS.WAITING_JOIN")
            ))
            ->get();
        return $list;

    }


    public function paginateWhere($where, $limit, $columns = ['*'], $moreCondition=true) {
        $model = parent::paginateWhere($where, $limit, $columns = ['*'], $moreCondition);

        $columns = ['event.*', 'c.nickname', 'c.mobile'];
        return $model
            ->leftJoin('customer as c', 'event.customer_id', '=', 'c.customer_id')
            ->paginate($limit, $columns);
    }


    public function getMerchantEventList($customerId,$pageNum) {
        $model = $this->model;
        $list = $model
            ->where('customer_id','=',$customerId)
            ->orderBy('created_at', 'desc')
            ->forPage($pageNum, 10)
            ->get();
        return $list;
    }

}
