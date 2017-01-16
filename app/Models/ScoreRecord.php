<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScoreRecord extends Model {
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
    protected $table = "score_record";

    protected $primaryKey = "record_id";
}
