<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DailyLogReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * Run with: php artisan daily:log
     */
    protected $signature = 'daily:log';

    /**
     * The console command description.
     */
    protected $description = 'Log a daily report message to laravel.log';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Log::info('📅 Daily report ran at: ' . now());
        $this->info('✅ daily:log command executed successfully.');
    }
}
