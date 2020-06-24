<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParagraphRequest extends FormRequest
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
        $rules['description_en'] = request('description_en') ? 'required|max:10000' : '';
        $rules['description_ar'] = request('description_ar') ? 'required|max:10000' : '';
        $rules["youtube_link"] = request("youtube_link") ? 'required|url|max:500' : '';
        $rules["title_en"] = request("title_en") ? 'required|max:5000' : '';
        $rules["title_ar"] = request("title_ar") ? 'required|max:5000' : '';
        $rules["image"] = request("image") ? 'required|image|mimes:png,jpg,jpeg|max:2500' : '';
        $rules["position"] = request("position") ? 'required|in:top,bottom,left,right' : '';

        return $rules;
    }
}
