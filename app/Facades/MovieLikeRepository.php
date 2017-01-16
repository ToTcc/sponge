<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the MovieLike repository facade class
 */
class MovieLikeRepository extends Facade {
    protected static function getFacadeAccessor() {
        return 'MovieLikeRepository';
    }
}
