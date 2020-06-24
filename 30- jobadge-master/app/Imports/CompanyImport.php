<?php

namespace App\Imports;

use App\Company;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;

class CompanyImport implements ToModel, WithHeadingRow
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

        $company_model = new Company;

        $company = $company_model->where('email', $row['email'])->orWhere('phone', $row['phone'])->first();

        if (!$company_model->validateLatitude($row['lat']) || !$company_model->validateLongitude($row['lng'])) {
            throw new \Exception('error in latitude or longitude in any of your records');
        }

        if ($company) {
            $validator = Validator::make($row, Company::validateImportedExcel($company->id));

            if ($validator->fails()) {
                throw new \Exception($validator->errors());
            }

            $company->update([
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => \Hash::make($row['password']),
                'phone' => $row['phone'],
                'URL' => $row['url'],
                'description' => $row['description'],
                'package_id' => $row['package_id'],
                'size_id' => $row['size_id'],
                'industry_id' => $row['industry_id'],
                'country_id' => $row['country_id'],
                'city_id' => $row['city_id'],
                'lat' => $row['lat'],
                'lng' => $row['lng'],
            ]);
        } else {
            $validator = Validator::make($row, company::validateImportedExcel());

            if ($validator->fails()) {
                throw new \Exception($validator->errors());
            }

            return new company([
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
                'name' => $row['name'],
                'email' => $row['email'],
                'password' => \Hash::make($row['password']),
                'phone' => $row['phone'],
                'URL' => $row['url'],
                'description' => $row['description'],
                'package_id' => $row['package_id'],
                'size_id' => $row['size_id'],
                'industry_id' => $row['industry_id'],
                'country_id' => $row['country_id'],
                'city_id' => $row['city_id'],
                'lat' => $row['lat'],
                'lng' => $row['lng'],
            ]);
        }
    }
}
