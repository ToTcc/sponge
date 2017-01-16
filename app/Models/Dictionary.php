<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model {
    /**
     * [$guarded description]
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * [$guarded description]
     *
     * @var string
     */
    protected $table = "dictionary";

    protected $primaryKey = "dictionary_id";
}
