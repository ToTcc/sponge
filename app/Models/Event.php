<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {
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
    protected $table = "event";

    protected $primaryKey = "event_id";
}
