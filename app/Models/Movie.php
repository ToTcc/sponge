<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model {
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
    protected $table = "movie";

    protected $primaryKey = "movie_id";
}
