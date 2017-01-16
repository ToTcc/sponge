<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the Activity repository facade class
 */
class ActivityRepository extends Facade {
    protected static function getFacadeAccessor() {
        return 'ActivityRepository';
    }
}
