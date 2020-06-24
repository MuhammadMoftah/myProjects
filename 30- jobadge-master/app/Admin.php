<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'image', 'super_admin'
    ];

    public function login_rules()
    {
        return [
            'email' => 'required',
            'password' => 'required'
        ];
    }

    public function profile_rules()
    {
        $admin = Auth::guard('admin')->user();
        return [
            'email' => 'required|email|max:190|unique:users,email,' . $admin->id,
            'name' => 'required|max:200',
        ];
    }

    public function password_validate()
    {
        return [
            'password' => ['required', 'min:8', 'Regex:/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', 'confirmed']
        ];
    }

    public function validate_image()
    {
        return [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function getAdminImage()
    {
        return env('AWS_URL') . 'admins/' . $this->image;
        
    }
}
