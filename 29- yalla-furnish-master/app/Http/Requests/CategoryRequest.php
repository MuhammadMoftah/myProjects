<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        ];

        if (request()->route()->getName() == "admin.category.edit.post") {
            $id = $this->route('id');
            $rules['slug'] = ['required', 'max:300', 'unique:categories,slug,' . $id, 'regex:/^[A-Za-z0-9 _-]{1,100}$/i'];
        } else {
            $rules['slug'] = ['required', 'max:300', 'unique:categories,slug', 'regex:/^[A-Za-z0-9 _-]{1,100}$/i'];
        }

        if (request('category_image')) {
            $rules['category_image'] = 'required|image|mimes:jpeg,png,jpg|max:5000';
        }

        return $rules;
    }
}
