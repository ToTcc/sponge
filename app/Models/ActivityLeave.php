<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLeave extends Model {
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
    protected $table = "activity_leave";

    protected $primaryKey = "leave_id";
}
