<?php

namespace App\Console;

use App\Services\SystemService;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;


class Kernel extends ConsoleKernel {


    protected function schedule(Schedule $schedule) {

        $schedule->call(function() {

            SystemService::findPlayerTransaction(Carbon::now()->format("Y-m-d"));

            Log::info("Scheduler running");

        })->dailyAt("1:00");

    }


    protected function commands() {

        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');

    }


}
