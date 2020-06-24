<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddTopicRequest extends FormRequest
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
            'images' => 'array|min:1|max:5',
            'categories' => 'required|array|min:1|max:3',
            'images' => 'required|array|min:1|max:5',
            'categories.*' => 'required|distinct',
            'images.*' => 'required|distinct'
        ];

        request('link') ? $rules['link'] = 'required|url' : '';

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
