<?php

namespace App\Imports;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\User;

class UsersImport implements ToModel
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

        $user_model = new User;
        $email = $row[13];
        $name = $row[14];
        $phone = $row[15];
        $user = $user_model->where('email', $email)->first();
        if ($user) {
            $user->update([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'password' => '12345678'
            ]);
        } else {
            return new User([
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'password' => '12345678'
            ]);
        }
    }
}
