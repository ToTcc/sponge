<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the ActivityComment repository facade class
 */
class ActivityCommentRepository extends Facade {
    protected static function getFacadeAccessor() {
        return 'ActivityCommentRepository';
    }
}
