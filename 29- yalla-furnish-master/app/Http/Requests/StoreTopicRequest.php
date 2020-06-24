<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTopicRequest extends FormRequest
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
            'body' => 'required|max:4000',
            'categories' => 'required|array|min:1|max:3',
            'images' => 'required|array|min:1|max:5',
            'categories.*' => 'distinct|exists:categories,id',
            'images.*' => 'distinct|image|mimes:jpeg,png,jpg|max:5000',
        ];

        if (request('link')) {
            $rules['link'] = 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        }

        return $rules;
    }
}
