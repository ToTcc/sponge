<?php

namespace App\Repositories;

/**
 * Customer Model Repository
 */
class CustomerRepository extends CommonRepository {

    public function getBlackList() {

        $map["black"] = 1;
        $list = $this->model
            ->where($map)
            ->get();
        return $list;

    }

}
