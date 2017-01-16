<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityPriceRule extends Model {
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
    protected $table = "activity_price_rule";

    protected $primaryKey = "rule_id";
}
