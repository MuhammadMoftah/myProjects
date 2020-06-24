<?php

namespace App\Console\Commands;

use App\Models\Ads;
use Illuminate\Console\Command;
use Carbon\Carbon;

class ActivateAds extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'activate:ads';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'activate ads after expiration';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $expiredAds = Ads::expired()->get();

        foreach ($expiredAds as $ad) {
            $nexMonth = Carbon::now()->addMonths(1)->format('Y-m-d');
            $ad->update(['expire_date' => $nexMonth]);
        }
    }
}
