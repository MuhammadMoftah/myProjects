<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultantRequest extends FormRequest
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
            'message' => 'required|max:1000',
        ];

        if (request('images')) {
            $rules['images'] = 'required|array|min:1|max:5';
            $rules['images.*'] = 'required|image|mimes:jpg,jpeg,png|max:5000';
        }

        if (request('subject')) {
            $rules['subject'] = 'required|max:250';
        }

        return $rules;
    }
}
