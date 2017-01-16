<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Facades\CustomerRepository;
use App\Facades\MovieRepository;
use App\Facades\ScoreRecordRepository;
use App\Facades\ScoreRuleRepository;
use App\Facades\ActivityJoinRepository;
use App\Facades\ActivityRepository;

class EndActivity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'endActivity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change status of end activities';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $now = getCurrentTime();

        $list = ActivityRepository::getWaitingEndList();

        foreach($list as $activity) {

            if($activity["show_time"] <= $now) {

                //更新活动状态
                $activityData["status"] = config("enumerations.ACTIVITY_STATUS.END");
                ActivityRepository::saveById($activity["activity_id"], $activityData);

                //更新电影状态
                $movie = MovieRepository::findMovieById($activity["movie_id"]);
                $movieData["status"] = config("enumerations.MOVIE_STATUS.INIT");
                MovieRepository::saveById($movie["movie_id"], $movieData);

                //检查用户是否签到
                $joinList = ActivityJoinRepository::getNotSignListByActivityId($activity["activity_id"]);

                foreach($joinList as $join) {

                    //扣分
                    $scoreRule = ScoreRuleRepository::findByCode("ACTIVITY_NO_SHOW");

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
                            $scoreRecordData["type"] = config("enumerations.SCORE_RECORD_TYPE.ACTIVITY");
                            $scoreRecordData["refer_id"] = $activity["activity_id"];
                            $scoreRecordData["rule_code"] = $scoreRule["code"];

                            ScoreRecordRepository::create($scoreRecordData);

                        }

                    }

                    //更新状态
                    $joinData["status"] = config("enumerations.ACTIVITY_JOIN_STATUS.ABSENT");
                    ActivityJoinRepository::saveById($join["join_id"], $joinData);

                }

            }

        }
    }
}
