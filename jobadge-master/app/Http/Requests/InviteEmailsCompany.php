<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InviteEmailsCompany extends FormRequest
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
        return [
            "emails" => "required|array|min:1",
            "emails.*" => "required|email|distinct",
        ];
    }

    public function messages()
    {
        return [
            "required" => "email input required",
            "email" => "must be valid email address",
            "distinct" => "emails must be distincts",
        ];
    }
}
