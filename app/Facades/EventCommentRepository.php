<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the EventComment repository facade class
 */
class EventCommentRepository extends Facade {
    protected static function getFacadeAccessor() {
        return 'EventCommentRepository';
    }
}
