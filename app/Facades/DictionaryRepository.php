<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * This is the Dictionary repository facade class
 */
class DictionaryRepository extends Facade {
    protected static function getFacadeAccessor() {
        return 'DictionaryRepository';
    }
}
