<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the ScoreRule repository facade class
 */
class ScoreRuleRepository extends Facade {
    protected static function getFacadeAccessor() {
        return 'ScoreRuleRepository';
    }
}
