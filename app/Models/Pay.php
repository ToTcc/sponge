<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pay extends Model {
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
    protected $table = "pay";

    protected $primaryKey = "pay_id";
}
