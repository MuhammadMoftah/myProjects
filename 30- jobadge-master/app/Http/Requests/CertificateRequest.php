<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateRequest extends FormRequest
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
            'name' => 'required|max:200',
            'place_name' => 'required|max:200',
            'member_id' => 'sometimes|max:25',
            'date' => 'required|required|date|before_or_equal:today',
            'expired_date' =>'required_without:no_expire|date|after:date'
        ];
    }
}
