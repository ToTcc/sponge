<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the ScoreRecord repository facade class
 */
class ScoreRecordRepository extends Facade {
    protected static function getFacadeAccessor() {
        return 'ScoreRecordRepository';
    }
}
