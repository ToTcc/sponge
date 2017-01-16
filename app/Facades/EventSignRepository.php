<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the EventSign repository facade class
 */
class EventSignRepository extends Facade {
    protected static function getFacadeAccessor() {
        return 'EventSignRepository';
    }
}
