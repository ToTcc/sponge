<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the ActivityJoin repository facade class
 */
class ActivityJoinRepository extends Facade {
    protected static function getFacadeAccessor() {
        return 'ActivityJoinRepository';
    }
}
