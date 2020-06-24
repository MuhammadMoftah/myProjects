<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Illuminate\Support\Carbon;

class UpdateUserBirthDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:birth {number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update users birth date';

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

        $count = User::whereYear("birth_date", "2020")->count();
        $loop = 1;
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
                User::whereYear("birth_date", "2020")->chunk($number, function ($users) {
                    foreach ($users as $user) {
                        if ($user->getOriginal('age')) {
                            $user->update(["birth_date" => Carbon::now()->subYear($user->age)]);
                        } else {
                            $user->update(["birth_date" => null]);
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
