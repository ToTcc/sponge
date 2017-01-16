<?php

namespace App\Repositories;

/**
 * ScoreRule Model Repository
 */
class ScoreRuleRepository extends CommonRepository {

    public function findByCode($code) {
        $model = $this->model;
        $info = $model
            ->where("code", $code)
            ->first();
        return $info;
    }

}
