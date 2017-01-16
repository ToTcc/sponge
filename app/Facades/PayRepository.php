<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the Pay repository facade class
 */
class PayRepository extends Facade {
    protected static function getFacadeAccessor() {
        return 'PayRepository';
    }
}
