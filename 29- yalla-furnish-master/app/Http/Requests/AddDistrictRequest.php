<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDistrictRequest extends FormRequest
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
            'name_en' => 'required|max:250',
            'name_ar' => 'required|max:250',
            'city_id' => 'required|exists:cities,id'
        ];

        return $rules;
    }
}
