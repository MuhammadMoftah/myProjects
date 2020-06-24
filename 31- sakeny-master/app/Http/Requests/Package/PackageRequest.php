<?php

namespace App\Http\Requests\package;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            'description_en' => 'required|max:1000',
            'description_ar' => 'required|max:1000',
            'price' => 'required|numeric|digits_between:1,5|min:1',
            'duration_type_id' => 'required|exists:duration_types,id',
            'ad_type_id' => 'required|exists:ad_types,id'
        ];
    }
}
