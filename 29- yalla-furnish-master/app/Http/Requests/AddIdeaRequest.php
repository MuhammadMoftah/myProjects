<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddIdeaRequest extends FormRequest
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
            'idea_image' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'name_en' => 'required|max:5000',
            'name_ar' => 'required|max:5000',
            'categories' => 'required|array|min:1|max:10',
            'categories.*' => 'required|distinct|exists:categories,id',
            'paragraphs' => 'required|array|min:1',
        ];

        $paragraphs = request('paragraphs');

        foreach ($paragraphs as $key => &$paragraph) {
            $rules["paragraphs.$key.description_en"] = request("paragraphs.$key.description_en") ? 'required|max:10000' : '';
            $rules["paragraphs.$key.description_ar"] = request("paragraphs.$key.description_ar") ? 'required|max:10000' : '';
            $rules["paragraphs.$key.youtube_link"] = request("paragraphs.$key.youtube_link") ? 'required|url|max:500' : '';
            $rules["paragraphs.$key.title_en"] = request("paragraphs.$key.title_en") ? 'required|max:5000' : '';
            $rules["paragraphs.$key.title_ar"] = request("paragraphs.$key.title_ar") ? 'required|max:5000' : '';
            $rules["paragraphs.$key.image"] = request("paragraphs.$key.image") ? 'required|image|mimes:png,jpg,jpeg|max:2500' : '';
            $rules["paragraphs.$key.position"] = request("paragraphs.$key.position") ? 'required|in:top,bottom,left,right' : '';
        }

        request()->merge([
            'paragraphs' => $paragraphs,
        ]);

        request('user_id') ? $rules['user_id'] = 'required|exists:users,id' : '';

        return $rules;
    }
}
