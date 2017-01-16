<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovieLike extends Model {
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
    protected $table = "movie_like";

    protected $primaryKey = "like_id";
}
