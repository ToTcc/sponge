<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the EventJoin repository facade class
 */
class EventJoinRepository extends Facade {
    protected static function getFacadeAccessor() {
        return 'EventJoinRepository';
    }
}
