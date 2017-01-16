<?php

namespace App\Repositories;

/**
 * ActivityPriceRule Model Repository
 */
class ActivityPriceRuleRepository extends CommonRepository {

    public function findByActivityId($activityId) {

        $model = $this->model;
        $list = $model->where('activity_id', $activityId)
            ->orderBy('begin_time', 'asc')
            ->get();
        return $list;
    }

}
