<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventComment extends Model {
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
    protected $table = "event_comment";

    protected $primaryKey = "comment_id";
}
