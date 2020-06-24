<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MallRequest extends FormRequest
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
            'name' => 'required|max:255',
            'about' => 'required|max:2000',
            'active' => 'required|in:0,1'
        ];

        if (request('image') || request()->route()->getName() == 'admin.malls.create.post') {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg|max:3000';
        }

        if (request('cover') || request()->route()->getName() == 'admin.malls.create.post') {
            $rules['cover'] = 'required|image|mimes:jpeg,png,jpg|max:3000';
        }

        if (request('facebook')) {
            $rules['facebook'] = 'required|max:250';
        }

        if (request('twitter')) {
            $rules['twitter'] = 'required|max:250';
        }

        if (request('instagram')) {
            $rules['instagram'] = 'required|max:250';
        }

        if (request('location')) {
            $rules['location'] = 'required|max:500';
        }

        if (request('opening_hours')) {
            $rules['opening_hours'] = 'required|max:2000';
        }

        return $rules;
    }
}
