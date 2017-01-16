<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the ActivityPriceRule repository facade class
 */
class ActivityPriceRuleRepository extends Facade {
    protected static function getFacadeAccessor() {
        return 'ActivityPriceRuleRepository';
    }
}
