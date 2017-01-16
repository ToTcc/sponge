<?php

namespace App\Console;

use App\Facades\CustomerRepository;
use App\Facades\EventJoinRepository;
use App\Facades\EventRepository;
use App\Facades\MovieRepository;
use App\Facades\ScoreRecordRepository;
use App\Facades\ScoreRuleRepository;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Facades\ActivityJoinRepository;
use App\Facades\ActivityPriceRuleRepository;
use App\Facades\ActivityRepository;

use DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\EndEvent::class,
        \App\Console\Commands\EndActivity::class,
        \App\Console\Commands\RestoreCredit::class,
        \App\Console\Commands\ChangeActivityPrice::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /**
         * 判断event是否结束
         */
        $schedule->command('endEvent')->daily();

        /**
         * 判断activity是否结束
         */
        $schedule->command('endActivity')->daily();

        /**
         * 判断用户停用是否到期
         */
        $schedule->command('restoreCredit')->daily();

        /**
         * 更新电影阶梯价格
         */
        $schedule->command('changeActivityPrice')->daily();
    }
}
