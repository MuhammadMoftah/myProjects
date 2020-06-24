<?php

namespace App\Exports;

use App\Company;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CompanyExport implements FromCollection, WithStrictNullComparison, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $all_companies = Company::select('id', 'first_name','last_name','name','email','phone','size_id','created_at', 'package_id')->with(['size','package'])->get();
        $final_companies = array();
        foreach ($all_companies as $key => $company) {
            $final_companies[$key]['name'] = $company->name;
            $final_companies[$key]['email'] = $company->email;
            $final_companies[$key]['phone'] = $company->phone;
            $final_companies[$key]['size'] = $company->size->to . " : ".$company->size->from;
            $final_companies[$key]['full name'] = $company->first_name ." ". $company->last_name;
            $final_companies[$key]['package'] = $company->package ? $company->package->name_en . ' ' . $company->package->name_ar : 'no package assigned';
            
            $final_companies[$key]['feature_1'] = $company->package ? $company->package->feature1_en . ' ' . $company->package->feature1_ar : '';
            $final_companies[$key]['feature_2'] = $company->package ? $company->package->feature2_en . ' ' . $company->package->feature2_ar : '';
            $final_companies[$key]['feature_3'] = $company->package ? $company->package->feature3_en . ' ' . $company->package->feature3_ar : '';
            $final_companies[$key]['created_at'] = $company->created_at;
        }
        return collect($final_companies);
    }

    public function headings(): array
    {
        return [
            'company name',
            'business mail',
            'telephone number',
            'size of company',
            "Name of Contact Person",
            'package name',
            'feature 1',
            'feature 2',
            'feature 3',
            'subscription date'
        ];
    }
}
