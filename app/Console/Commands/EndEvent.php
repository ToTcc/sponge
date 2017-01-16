<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Facades\CustomerRepository;
use App\Facades\EventJoinRepository;
use App\Facades\EventRepository;
use App\Facades\ScoreRecordRepository;
use App\Facades\ScoreRuleRepository;

class EndEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'endEvent';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change status of end events';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $now = getCurrentTime();

        $list = EventRepository::getWaitingEndList();

        foreach($list as $event) {

            if($event["open_time"] <= $now) {

                //更新活动状态
                $eventData["status"] = config("enumerations.EVENT_STATUS.END");
                EventRepository::saveById($event["event_id"], $eventData);

                //检查用户是否签到
                $joinList = EventJoinRepository::getNotSignListByEventId($event["event_id"]);

                foreach($joinList as $join) {

                    //扣分
                    $scoreRule = ScoreRuleRepository::findByCode("EVENT_NO_SHOW");

                    if($scoreRule["score"] != 0) {

                        $customer = CustomerRepository::find($join["customer_id"]);

                        if($customer["score"] > 0) {

                            //扣总分
                            $customerData["score"] = ($customer["score"] - $scoreRule["score"] > 0)
                                ? ($customer["score"] - $scoreRule["score"]) : 0;

                            if($customerData["score"] == 0) {
                                $customerData["black"] = 1;
                                $customerData["unlock_time"] = date("Y-m-d H:i:s", strtotime("+15 day"));
                            }

                            CustomerRepository::saveById($customer["customer_id"], $customerData);

                            //添加扣分记录
                            $scoreRecordData["customer_id"] = $customer["customer_id"];
                            $scoreRecordData["score"] = $scoreRule["score"];
                            $scoreRecordData["type"] = config("enumerations.SCORE_RECORD_TYPE.EVENT");
                            $scoreRecordData["refer_id"] = $event["event_id"];
                            $scoreRecordData["rule_code"] = $scoreRule["code"];

                            ScoreRecordRepository::create($scoreRecordData);

                        }

                    }

                    //更新状态
                    $joinData["status"] = config("enumerations.EVENT_JOIN_STATUS.ABSENT");
                    EventJoinRepository::saveById($join["join_id"], $joinData);

                }

            }

        }
    }
}
