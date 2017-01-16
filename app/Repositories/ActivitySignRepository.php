<?php

namespace App\Repositories;

/**
 * ActivitySign Model Repository
 */
class ActivitySignRepository extends CommonRepository {

    public function findByActivityIdAndCustomerId($activityId, $customerId) {
        $map[] = ["activity_id", "=", $activityId];
        $map[] = ["customer_id", "=", $customerId];
        $info = $this->getByWhere($map)
            ->first();
        return $info;
    }

}
