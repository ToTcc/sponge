<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
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
    protected $table = "customer";

    protected $primaryKey = "customer_id";
}
