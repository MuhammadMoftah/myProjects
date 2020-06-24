<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeBannerRequest extends FormRequest
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

        if (request('image')) {
            $rules['image'] = 'required|image|mimes:png,jpg,jpeg|max:5000';
        }

        if (request('link')) {
            $rules['link'] = 'required|max:255';
        }

        return $rules;
    }
}
