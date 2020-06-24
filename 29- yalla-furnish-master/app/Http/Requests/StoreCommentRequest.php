<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeCommentRequest extends FormRequest
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
            'comment' => 'required_without:image|max:180',
            'image' => 'required_without:comment|max:5000'
        ];

        return $rules;
    }
}
