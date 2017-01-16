<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggestions extends Model {
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
    protected $table = "suggestions";

    protected $primaryKey = "suggestion_id";
}
