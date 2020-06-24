<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIdeaRequest extends FormRequest
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
            'name_en' => 'required|max:5000',
            'name_ar' => 'required|max:5000',
            'categories' => 'required|array|min:1|max:10',
            'categories.*' => 'required|distinct|exists:categories,id'
        ];

        request('user_id') ? $rules['user_id'] = 'required|exists:users,id' : '';
        request('idea_image') ? $rules['idea_image'] = 'image|mimes:jpeg,png,jpg|max:5000' : '';

        return $rules;
    }
}
