<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = auth()->guard('user')->user()->id;

        $rules = [
            'email' => ['required', 'max:191', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix', 'unique:users,email,' . $id],
            'first_name' => 'required|max:250',
            'gender' => 'required|in:male,female',
            'last_name' => 'required|max:250',
            'country_id' => 'required|exists:countries,id'
        ];

        if (request('password')) {
            $rules['password'] = 'required|min:6|confirmed';
        }

        if (request('district_id')) {
            $rules['district_id'] =  'required|exists:districtes,id';
        }

        if (request('image')) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg|max:5000';
        }

        if (request('cover')) {
            $rules['cover'] = 'required|image|mimes:jpeg,png,jpg|max:5000';
        }

        if (request('city_id')) {
            $rules['city_id'] = 'required|exists:cities,id';
        }

        return $rules;
    }
}
