<?php

namespace App\Imports;

use App\Job;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;

class JobsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (count($row) != 15) {
            throw new \Exception('please provide all needed data!');
        }

        $job = new Job;
        $validator = Validator::make($row, $job->validateImportedExcel());

        if ($validator->fails()) {
            throw new \Exception($validator->errors());
        }

        return new Job([
            'title' => $row['title'],
            'jobtype_id' => $row['jobtype_id'],
            'joblevel_id' => $row['joblevel_id'],
            'gender' => $row['gender'],
            'category_id' => $row['category_id'],
            'experience_years' => $row['experience_years'],
            'education_level' => $row['education_level'],
            'vacancies' => $row['vacancies'],
            'nationality_id' => $row['nationality_id'],
            'description' => $row['description'],
            'job_requirement' => $row['job_requirement'],
            'KPI' => $row['kpi'],
            'benefits' => $row['benefits'],
            'skills' => $row['skills'],
            'company_id' => $row['company_id']
        ]);
    }
}
