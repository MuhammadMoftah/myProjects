<?php

namespace App\Services\site;

use Illuminate\Http\Request;
use App\User;
use App\Services\site\BoardService;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserService
{
    private $user_model;
    private $request;

    public function __construct(User $user_model, Request $request)
    {
        $this->user_model = $user_model;
        $this->request = $request;
    }

    public function registerUser()
    {
        $user = $this->user_model->create([
            'first_name' => $this->request->first_name,
            'last_name' => $this->request->last_name,
            'email' => $this->request->email,
            'gender' => $this->request->gender,
            'date_of_birth' => $this->request->date_of_birth,
            // 'district_id' => $this->request->district_id,
            'password' => $this->request->password,
            'city_id' => $this->request->city_id,
            'country_id' => $this->request->country_id
        ]);

        $board_service = new BoardService();

        $board_service->addDefaultBoards($user);

        return $user;
    }

    public function loginUser()
    {
        isset($this->request->remember_me) ? $remember_me = true : $remember_me = false;

        if (auth('user')->attempt(['email' => $this->request->email, 'password' => $this->request->password], $remember_me)) {
            return true;
        }
        return false;
    }

    public function loginUserApi()
    {
        return auth('api')->attempt(['email' => $this->request->email, 'password' => $this->request->password]);
    }

    public function view_user_profile($id)
    {
        return $this->user_model->with(['boards', 'products', 'followers', 'followings'])->findOrFail($id);
    }

    public function sendContactMail()
    {
        $to = 'info@yalla-furnish.com';
        $subject = $this->request->subject;
        $message = $this->request->message;
        $name = $this->request->name;
        $email = $this->request->email;
        $headers = "From: " . $email;
        $body = 'Message From : ' . $name . ' and his/her email : ' . $email . ', and Message : ' . $message;

        mail($to, $subject, $body, $headers);
    }

    public function updateProfile()
    {
        $user = auth()->guard('user')->user();
        $user->first_name = request('first_name');
        $user->last_name = request('last_name');
        $user->gender = request('gender');
        $user->email = request('email');
        $user->country_id = request('country_id');

        if (request('password')) {
            $user->password = request('password');
        }

        if (request('district_id')) {
            $user->district_id = request('district_id');
        }

        $user->city_id = request('city_id') ? request('city_id') : null;

        if (request()->hasFile('image')) {
            $user->image = request('image');
        }

        if (request()->hasFile('cover')) {
            $user->cover = request('cover');
        }
        if (request('hidden')) {
            $user->hidden = 1;
        } else {
            $user->hidden = 0;
        }

        $user->update();
    }

    public function getSingleUser($id)
    {
        return $this->user_model->findOrFail($id);
    }
}
