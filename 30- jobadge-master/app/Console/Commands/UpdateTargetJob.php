<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\TargetJob;
use Illuminate\Support\Carbon;

class UpdateTargetJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:target {number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update target job infusty an category ';

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
        $number  = $this->argument('number');
        $query   = TargetJob::whereNotNull("industry_id")->orWhereNotNull("category_id");
        $count   = $query->count();
        $loop    = 1;
        if ($count == 0)
            return $this->error(" no record available to update .");

        if ($count > $number) {
            $loop =  round($count / $number);
        }
        $this->comment("start update $count ");
        if ($this->confirm('Is  correct, do you wish to continue update ?  [y|N]')) {
            //
            $this->output->progressStart($loop);
            for ($i = 0; $i < $loop; $i++) {
                $query->chunk($number, function ($targets) {
                    foreach ($targets as  $target) {
                        # code...
                        if($target->category_id){
                            $target->categories()->sync($target->category_id);
                            $target->update([
                                "category_id" => null
                            ]);
                        }   
    
                        if($target->industry_id){
                            $target->industries()->sync($target->industry_id);
                            $target->update([
                                "industry_id" => null
                            ]);
                        }
                    }
                    
                   
                });

                $this->output->progressAdvance();
            }
            $this->output->progressFinish();
            $this->info("done update sucessfull");
        } else {
            $this->error(" no update happen .");
        }
    }
}
