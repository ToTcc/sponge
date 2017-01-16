<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model {
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
    protected $table = "apply";

    protected $primaryKey = "apply_id";
}
