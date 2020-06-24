<?php

use Illuminate\Database\Seeder;
use App\Job;
class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobs = Job::get();
        if ($jobs) {
            foreach ($jobs as $job){ 
                $id =$job->id;
                $title = preg_replace("![^a-z0-9]+!i", '-',  $job->title);
                $companyName = false;
                if( $job->confidential === 0) {    
                    $companyName =  preg_replace("![^a-z0-9]+!i", '-' , $job->company()->first()->name);
                } 
                $city =  preg_replace("![^a-z0-9]+!i", '-' ,$job->company->city->name_en);
                $country = preg_replace("![^a-z0-9]+!i", '-' ,$job->company->country->name_en);  
                if($companyName === false) {
                    $job->update([
                        'slug' => $id . '-' .  $title . '-'  . $city . '-' . $country
                    ]);  
                } else {    
                    $job->update([
                        'slug' => $id . '-' .  $title . '-' . $companyName . '-' . $city . '-' . $country
                    ]); 
                }
                
            } 
        }
    }
}
