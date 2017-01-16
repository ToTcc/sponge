<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model {
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
    protected $table = "activity";

    protected $primaryKey = "activity_id";
}
