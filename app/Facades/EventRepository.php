<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the Event repository facade class
 */
class EventRepository extends Facade {
    protected static function getFacadeAccessor() {
        return 'EventRepository';
    }
}
