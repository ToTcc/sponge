<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the Suggestions repository facade class
 */
class SuggestionsRepository extends Facade {
    protected static function getFacadeAccessor() {
        return 'SuggestionsRepository';
    }
}
