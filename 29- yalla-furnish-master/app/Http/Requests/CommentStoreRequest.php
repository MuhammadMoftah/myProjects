<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// this related to polymorphic
class CommentStoreRequest extends FormRequest
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
        return [
           'comentableId' => 'required|integer|min:1|digits_between: 1,6', 
           'body' => 'required|min:1|max:1000',
           'type' => 'required|string|min:3|max:15', 
        ];
    }
}
