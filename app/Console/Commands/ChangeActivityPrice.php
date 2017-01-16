<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Facades\ActivityPriceRuleRepository;
use App\Facades\ActivityRepository;

class ChangeActivityPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'changeActivityPrice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change Activity price in different periods';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $now = getCurrentTime();

        $activityList = ActivityRepository::findValidList();

        foreach($activityList as $activity) {

            $ruleList = ActivityPriceRuleRepository::findByActivityId($activity["activity_id"]);

            foreach($ruleList as $rule) {

                if($rule["status"]
                    == config("enumerations.ACTIVITY_PRICE_RULE_STATUS.WAITING")) {

                    if($rule["begin_time"] <= $now) {
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
