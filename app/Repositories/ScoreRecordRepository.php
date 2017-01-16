<?php

namespace App\Repositories;

/**
 * ScoreRecord Model Repository
 */
class ScoreRecordRepository extends CommonRepository {

    public function getScoreRecord($customerId) {
        $model = $this->model;
        $list = $model
            ->where("customer_id", $customerId)
            ->orderBy('created_at', 'asc')
            ->get();

        return $list;
    }

    public function getValidListByCustomerId($customerId) {
        $model = $this->model;

        $map["score_record.customer_id"] = $customerId;
        //$map["status"] = config("enumerations.");

        $list = $model->leftJoin('activity as a', 'a.activity_id', '=', 'score_record.refer_id')
            ->leftJoin('event as e', 'e.event_id', '=', 'score_record.refer_id')
            ->leftJoin('movie as m', 'm.douban_id', '=', 'a.movie_id')
            ->leftJoin('score_rule as sr', 'sr.code', '=', 'score_record.rule_code')
            ->where($map)
            ->orderBy('created_at', 'asc')
            ->get(["score_record.*","sr.description","e.title as event_title","e.open_time as event_time",
                "e.second_title as event_second_title","m.info","a.show_time as activity_time"]);

        return $list;
    }

}
