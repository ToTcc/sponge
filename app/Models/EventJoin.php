<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventJoin extends Model {
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
    protected $table = "event_join";

    protected $primaryKey = "join_id";
}
