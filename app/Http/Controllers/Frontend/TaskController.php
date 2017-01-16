<?php

namespace App\Http\Controllers\Frontend;

use App\Facades\ActivityJoinRepository;
use App\Facades\ActivityPriceRuleRepository;
use App\Facades\ActivityRepository;
use App\Facades\CustomerRepository;
use App\Facades\MovieLikeRepository;
use App\Facades\MovieRepository;
use App\Models\Movie;
use App\Models\MovieLike;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{

    public function __construct() {

    }

    /**
     * 检查是否流标
     */
    public function checkActivityDeadline() {

        $now = getCurrentTime();

        $activityList = ActivityRepository::findValidList();

        foreach($activityList as $activity) {

            if($activity["deadline"] <= $now) {

                //更新活动状态
                $activityData["status"] = config("enumerations.ACTIVITY_STATUS.CANCEL");
                ActivityRepository::saveById($activity["activity_id"], $activityData);

                $activityJoinList = ActivityJoinRepository::findPayListByActivityId($activity["activity_id"]);
                $wechat = app("wechat");
                foreach($activityJoinList as $join) {
                    $result = $wechat->payment->refund($join["out_trade_no"], time().rand(0, 999), $join["money"]);
                }

            }

        }

    }

    /**
     * 更新电影阶梯价格
     */
    public function updateActivityPrice() {

        $now = getCurrentTime();

        $activityList = ActivityRepository::findValidList();

        foreach($activityList as $activity) {

            $ruleList = ActivityPriceRuleRepository::findByActivityId($activity["activity_id"]);

            foreach($ruleList as $rule) {

                if($rule["status"]
                    == config("enumerations.ACTIVITY_PRICE_RULE_STATUS.WAITING")) {

                    if($rule["begin_time"] >= $now) {
                        $ruleData["status"] = config("enumerations.ACTIVITY_PRICE_RULE_STATUS.ONGOING");
                        ActivityPriceRuleRepository::saveById($rule["rule_id"], $ruleData);
                    }

                } elseif($rule["status"]
                    == config("enumerations.ACTIVITY_PRICE_RULE_STATUS.ONGOING")) {

                    if($rule["end_time"] <= $now) {
                        $ruleData["status"] = config("enumerations.ACTIVITY_PRICE_RULE_STATUS.END");
                        ActivityPriceRuleRepository::saveById($rule["rule_id"], $ruleData);
                    }

                }
            }
        }
    }

}
