<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventSign extends Model {
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
    protected $table = "event_sign";

    protected $primaryKey = "sign_id";
}
