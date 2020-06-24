<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditTopicCommentRequest extends FormRequest
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
            'comment' => 'required_without:image|max:300',
            'id' => 'required|numeric|digits_between:1,10'
        ];

        return $rules;
    }
}
