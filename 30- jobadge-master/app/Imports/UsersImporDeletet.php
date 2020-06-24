<?php

namespace App\Imports;


use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
class UsersImporDeletet implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // if (count($row) != 1) {
        //     throw new \Exception('please provide all needed data!');
        // }

        $user_model = new User;
        $email = explode('/', $row['email']);
        $email = trim($email[0]);
        // dd($email);
        $user = $user_model->where('email', $email)->delete();
    }
}

