<?php

namespace App\Exports;

use App\Job;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JobsExport implements FromCollection, WithStrictNullComparison, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $all_jobs = Job::get();

        $final_jobs = array();

        foreach ($all_jobs as $key => $job) {
            $final_jobs[$key]['company_name'] = $job->company->name;
            $final_jobs[$key]['jobtype'] = $job->jobtype->name_en . ' ' . $job->jobtype->name_ar;
            $final_jobs[$key]['joblevel'] = $job->joblevel->name_en . ' ' . $job->joblevel->name_ar;
            $final_jobs[$key]['category'] = $job->category->name_en . ' ' . $job->category->name_ar;
            $final_jobs[$key]['nationality'] = $job->nationality->name_en . ' ' . $job->nationality->name_ar;
            $final_jobs[$key]['experience_years'] = $job->experience_years;
            $final_jobs[$key]['education_level'] = $job->education_level;
            $final_jobs[$key]['vacancies'] = $job->vacancies;
            $final_jobs[$key]['description'] = $job->description;
            $final_jobs[$key]['job_requirement'] = $job->job_requirement;
            $final_jobs[$key]['benefits'] = $job->benefits;
            $final_jobs[$key]['KPI'] = $job->KPI;
            $final_jobs[$key]['skills'] = $job->skills;
            $final_jobs[$key]['company_url'] = $job->company_url;
            $final_jobs[$key]['created_at'] = $job->created_at;
        }

        return collect($final_jobs);
    }

    public function headings(): array
    {
        return [
            'company_name',
            'job_type',
            'job_level',
            'category',
            'nationality',
            'experience_years',
            'vacancies',
            'education_level',
            'description',
            'job_requirement',
            'benefits',
            'KPI',
            'skills',
            'apply_on_site',
            'company url',
            'created_at'
        ];
    }
}
