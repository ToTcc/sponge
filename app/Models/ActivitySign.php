<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivitySign extends Model {
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
    protected $table = "activity_sign";

    protected $primaryKey = "sign_id";
}
