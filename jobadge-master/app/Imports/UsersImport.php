<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (count($row) != 3) {
            throw new \Exception('please provide all needed data!');
        }

        $user_model = new User;
        $email = explode('/', $row['email']);
        $email = trim($email[0]);
        // $user = $user_model->where('email', $row['email'])->orWhere('phone', $row['phone'])->first();
        $user = $user_model->where('email', $email)->first();
        if ($user) {
            $validator = Validator::make($row, $user_model->validateImportedExcel($user->id));
            if ($validator->fails()) {
                throw new \Exception($validator->errors());
            }
            $user->update([
                'first_name' => $row['first_name'],
                // 'last_name' => $row['last_name'],
                // 'title' => $row['title'],
                // 'email' => $row['email'],
                'email' => $email,
                // 'phone' => $row['phone'],
                // 'password' => \Hash::make($row['password']),
                // 'no_of_views' => $row['no_of_views'],
                // 'no_of_shares' => $row['no_of_shares'],
                // 'country_id' => $row['country_id'],
                // 'city_id' => $row['city_id'],
                'verified' => $row['verified'],
            ]);
        } else {
            $validator = Validator::make($row, $user_model->validateImportedExcel());
            if ($validator->fails()) {
                throw new \Exception($validator->errors());
            }
            return new User([
                'first_name' => $row['first_name'],
                // 'last_name' => $row['last_name'],
                // 'title' => $row['title'],
                'email' => $email,
                // 'phone' => $row['phone'],
                // 'no_of_views' => $row['no_of_views'],
                // 'no_of_shares' => $row['no_of_shares'],
                // 'password' => \Hash::make($row['password']),
                // 'country_id' => $row['country_id'],
                // 'city_id' => $row['city_id'],
                'verified' => $row['verified'],
            ]);
        }
    }
}
