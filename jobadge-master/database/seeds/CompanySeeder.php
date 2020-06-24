<?php

use Illuminate\Database\Seeder;
use App\Company;
class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::get();
         if ($companies) {
            foreach ($companies as $company){ 
                $id =$company->id;
                $companyName =  preg_replace('/\s+/', '-' , $company->name); 
                $country = preg_replace('/\s+/', '-' ,$company->country()->first()->name_en); 
  
              $company->update([
                    'slug' => $id  . '-' . $companyName  . '-' . $country . '-jobs'
                ]);
             } 
        }

       

    }
}
