<?php

namespace App\Blog\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth("admin")->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule  = [
            "title"     =>"required|max:254",
            "body"      =>"required",
            "image"     =>"required|image",
            "tags"      => "nullable"
        ];
        
        if($this->flag_update){
            $rule['image'] = str_replace("required", "nullable", $rule['image']);
        }

        return $rule;
    }
}
