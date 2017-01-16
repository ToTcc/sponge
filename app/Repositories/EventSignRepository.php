<?php

namespace App\Repositories;

/**
 * EventSign Model Repository
 */
class EventSignRepository extends CommonRepository {

    public function findByEventIdAndCustomerId($eventId, $customerId) {
        $map[] = ["event_id", "=", $eventId];
        $map[] = ["customer_id", "=", $customerId];
        $info = $this->getByWhere($map)
            ->first();
        return $info;
    }

}
