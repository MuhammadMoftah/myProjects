<?php

namespace App\Blog\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
            "comment_id"     =>"required|exists:comments,id",
            "body"           =>"required", 
        ];
        

        return $rule;
    }
}
