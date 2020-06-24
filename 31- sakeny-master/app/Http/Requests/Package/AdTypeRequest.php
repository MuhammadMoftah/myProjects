<?php

namespace App\Http\Requests\Package;

use Illuminate\Foundation\Http\FormRequest;

class AdTypeRequest extends FormRequest
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
            'name_en' => 'required|max:250',
            'name_ar' => 'required|max:250',
            'no_of_special_ads' => 'required|numeric|min:1|digits_between:1,5',
            'no_of_repeated_ads' => 'required|numeric|min:1|digits_between:1,5',
            'no_of_seo_ads' => 'required|numeric|min:1|digits_between:1,5',
            'no_of_normal_ads' => 'required|numeric|min:1|digits_between:1,5',
        ];
    }
}
