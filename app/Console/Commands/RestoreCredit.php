<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Facades\CustomerRepository;
use DB;

class RestoreCredit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'restoreCredit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Restore user credits';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $now = getCurrentTime();

        $blackList = CustomerRepository::getBlackList();

        foreach($blackList as $black) {

            if($black["unlock_time"] >= $now) {

                //还原用户信用以及
                $customerData["black"] = 0;
                $customerData["score"] = 6;

                CustomerRepository::saveById($black["customer_id"], $customerData);

                $sql = "update v_score_record set status = 0 where customer_id = " . $black["customer_id"];

                //使历史信用记录不可见
                DB::update(DB::raw($sql));

            }
        }
    }
}
