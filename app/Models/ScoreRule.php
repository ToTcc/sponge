<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScoreRule extends Model {
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
    protected $table = "score_rule";

    protected $primaryKey = "rule_id";
}
