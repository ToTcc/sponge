<?php

namespace App\Repositories;

/**
 * EventComment Model Repository
 */
class EventCommentRepository extends CommonRepository {

    public function getAveragePointByCustomerId($customerId) {

        $map["e.customer_id"] = $customerId;

        $avg = $this->model
            ->leftJoin('event as e','e.event_id','=','event_comment.event_id')
            ->where($map)
            ->avg("point");

        return $avg;

    }

    public function getCountByCustomerIdAndType($customerId, $type) {

        $map["e.customer_id"] = $customerId;
        $map["event_comment.type"] = $type;

        $count = $this->model
            ->leftJoin('event as e','e.event_id','=','event_comment.event_id')
            ->where($map)
            ->count();

        return $count;

    }

}
