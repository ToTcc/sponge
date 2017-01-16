<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the Movie repository facade class
 */
class MovieRepository extends Facade {
    protected static function getFacadeAccessor() {
        return 'MovieRepository';
    }
}
