<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the Apply repository facade class
 */
class ApplyRepository extends Facade {
    protected static function getFacadeAccessor() {
        return 'ApplyRepository';
    }
}
