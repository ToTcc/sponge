<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the Customer repository facade class
 */
class CustomerRepository extends Facade {
    protected static function getFacadeAccessor() {
        return 'CustomerRepository';
    }
}
