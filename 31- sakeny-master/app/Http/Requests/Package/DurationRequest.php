<?php

namespace App\Http\Requests\Package;

use Illuminate\Foundation\Http\FormRequest;

class DurationRequest extends FormRequest
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
            'duration' => 'required|numeric|min:1|digits_between:1,5',
        ];
    }
}
