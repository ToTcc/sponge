<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the ActivityLeave repository facade class
 */
class ActivityLeaveRepository extends Facade {
    protected static function getFacadeAccessor() {
        return 'ActivityLeaveRepository';
    }
}
