<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the ActivitySign repository facade class
 */
class ActivitySignRepository extends Facade {
    protected static function getFacadeAccessor() {
        return 'ActivitySignRepository';
    }
}
