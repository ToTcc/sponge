<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityComment extends Model {
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
    protected $table = "activity_comment";

    protected $primaryKey = "comment_id";
}
