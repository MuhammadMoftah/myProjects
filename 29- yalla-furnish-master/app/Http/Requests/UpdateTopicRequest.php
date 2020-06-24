<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTopicRequest extends FormRequest
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
            'categories' => 'array|min:1|max:3',
            'categories.*' => 'distinct',
        ];

        if (request('images')) {
            $rules['images'] = 'array|min:1|max:5';
            $rules['images.*'] = 'distinct';
        }

        request('link') ? $rules['link'] = 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/' : '';

        request('user_id') ? $rules['user_id'] = 'required|exists:users,id' : '';

        $categories_count = count((array) request('categories'));

        if ($categories_count > 0) {
            foreach (request('categories') as $key => $value) {
                $rules['categories.' . $key] = 'required|exists:categories,id';
            }
        }

        $images_count = count((array) request('images'));

        if ($images_count > 0) {
            foreach (request('images') as $key => $value) {
                $rules['images.' . $key] = 'required|image|mimes:jpeg,png,jpg|max:5000';
            }
        }

        return $rules;
    }
}
