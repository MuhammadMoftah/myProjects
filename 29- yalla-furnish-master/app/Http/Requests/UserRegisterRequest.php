<?php

namespace App\Http\Requests;

use App\Http\Resources\Error\ValidationErrorResource;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class UserRegisterRequest extends FormRequest
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
        $rules = [
            'email' => ['required', 'email', 'max:190', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix', 'unique:users,email'],
            'first_name' => 'required|max:250',
            'last_name' => 'required|max:250',
            'gender' => 'required|in:male,female',
            // 'district_id' => 'required|exists:districtes,id',
            'last_name' => 'required|max:250',
            'date_of_birth' => 'required|date_format:d-m-Y|before:today',
            'password' => 'required|min:6|confirmed',
            'country_id' => 'required|exists:countries,id'
        ];

        $rules['city_id'] = request('city_id') ? 'required|exists:cities,id' : '';

        return $rules;
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        if (request()->wantsJson()) {
            $errors = $validator->errors();
            throw new HttpResponseException(response()->json(new ValidationErrorResource($errors), 422));
        } else {
            throw (new ValidationException($validator))
                ->errorBag($this->errorBag)
                ->redirectTo($this->getRedirectUrl());
        }
    }
}
