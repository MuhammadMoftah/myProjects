<?php

namespace App\Blog\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LikeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth("company")->check() ||  auth("user")->check() ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rule  = [
            'user_type'      => 'required|in:user,company',
            'user_id'        =>"required|exists:".( $this->user_type == "user" ? "users" :"companies" ).",id",
            "blog_id"        =>"required|exists:blogs,id",
        ];
        

        return $rule;
    }
}
