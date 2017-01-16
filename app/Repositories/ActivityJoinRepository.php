<?php

namespace App\Repositories;

/**
 * ActivityJoin Model Repository
 */
class ActivityJoinRepository extends CommonRepository {

    public function findPayListByActivityId($activityId) {

        $map["a.activity_id"] = $activityId;

        $list = $this->model
            ->leftJoin('activity as a', 'a.activity_id', '=', 'activity_join.activity_id')
            ->leftJoin('pay as p', 'p.pay_id', '=', 'activity_join.pay_id')
            ->where($map)
            ->get(['p.*']);
        return $list;

    }

    public function getTotalMovieJoinCount($movieId) {
        $map["a.movie_id"] = $movieId;
        $map["a.status"] = config("enumerations.ACTIVITY_STATUS.END");

        $count = $this->model
            ->leftJoin('activity as a', 'a.activity_id', '=', 'activity_join.activity_id')
            ->where($map)
            ->count();
        return $count;
    }

    public function findByActivityIdAndCustomerId($activityId, $customerId) {
        $map[] = ["activity_id", "=", $activityId];
        $map[] = ["customer_id", "=", $customerId];
        $info = $this->getByWhere($map)
            ->first();
        return $info;
    }

    public function findPayList($customerId, $pageNum) {

        $map["activity_join.customer_id"] = $customerId;

        $list = $this->model->leftJoin('activity as a', 'a.activity_id', '=', 'activity_join.activity_id')
            ->leftJoin('movie as m', 'm.douban_id', '=', 'a.movie_id')
            ->where($map)
            ->whereIn("activity_join.status", array(
                config("enumerations.ACTIVITY_JOIN_STATUS.END_PAY"),
                config("enumerations.ACTIVITY_JOIN_STATUS.REFUND"),
                config("enumerations.ACTIVITY_JOIN_STATUS.END_SIGN"),
                config("enumerations.ACTIVITY_JOIN_STATUS.END_COMMENT")
            ))
            ->orderBy('activity_join.created_at', 'desc')
            //->forPage($pageNum, 10)
            ->get(['m.*','a.show_time','a.activity_id','activity_join.status']);
        return $list;
    }

    public function getPayCount($customerId) {

        $map["customer_id"] = $customerId;
        $count = $this->model
            ->where($map)
            ->whereIn("status", array(
                config("enumerations.ACTIVITY_JOIN_STATUS.END_PAY"),
                config("enumerations.ACTIVITY_JOIN_STATUS.REFUND")
            ))->count();


        return $count;
    }

    public function getByCustomerId($customerId) {
        $map['activity_join.customer_id'] = $customerId;
        $list = $this->model
            ->leftJoin('pay as p','activity_join.pay_id','=','p.pay_id')
            ->leftJoin('activity as a','activity_join.activity_id','=','a.activity_id')
            ->leftJoin('movie as m','a.movie_id','=','m.douban_id')
            ->where($map)
            ->get(['activity_join.join_id', 'activity_join.created_at', 'm.info', 'a.status', 'p.money']);

        foreach($list as &$item) {
            $item['title'] = unserialize($item['info'])['title'];
            $item['link'] = unserialize($item['info'])['alt'];
        }

        return $list;
    }

    public function getCustomerListByActivityId($activityId) {

        $list = $this->model
            ->leftJoin('customer as c','activity_join.customer_id','=','c.customer_id')
            ->where('activity_join.activity_id','=',$activityId)
            ->whereNotIn('activity_join.status', [config('enumerations.ACTIVITY_JOIN_STATUS.WAITING_PAY')])
            ->get(['activity_join.join_id','activity_join.created_at','activity_join.status','c.nickname','c.sex','c.mobile']);

        return $list;
    }

    public function getNotSignListByActivityId($activityId) {

        $map["activity_id"] = $activityId;
        $map["status"] = config("enumerations.ACTIVITY_JOIN_STATUS.END_PAY");

        $list = $this->model
            ->where($map)
            ->get();

        return $list;
    }

}
