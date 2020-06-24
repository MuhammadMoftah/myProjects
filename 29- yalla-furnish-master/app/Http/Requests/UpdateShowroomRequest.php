<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateShowroomRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $rules = [
            'name_en' => 'required|max:200',
            'name_ar' => 'required|max:200',
            'styles' => 'required|array|min:1',
            'styles.*' => 'required|exists:styles,id',
        ];

        if (request()->route()->getName() == "admin.showroom.update") {
            if (request('malls')) {
                $rules['malls'] = 'required|array|min:1';
                $rules['malls.*'] = 'required|exists:malls,id';
            }
            $id = request('id');

            $rules['slug'] = ['required', 'max:300', 'unique:showrooms,slug,' . $id, 'regex:/^[A-Za-z0-9 _-]{1,100}$/i'];

            $rules['categories'] = 'required|array|min:1';
            $rules['categories.*'] = 'required|exists:categories,id';
        }

        if (isset($request->facebook)) {
            $rules['facebook'] = ['required', 'max:200', 'regex:/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/'];
        }
        if (isset($request->district_id)) {
            $rules['district_id'] = "required|exists:districtes,id";
        }
        if (isset($request->youtube)) {
            $rules['youtube'] = ['required', 'max:200', 'regex:/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/'];
        }
        if (isset($request->instgram)) {
            $rules['instgram'] = ['required', 'max:200', 'regex:/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/'];
        }
        if (isset($request->website)) {
            $rules['website'] = ['required', 'max:200', 'regex:/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/'];
        }
        if (isset($request->twitter)) {
            $rules['twitter'] = ['required', 'max:200', 'regex:/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/'];
        }
        if (isset($request->showroom_image)) {
            $rules['showroom_image'] = 'required|image|mimes:jpeg,png,jpg|max:5000';
        }
        if (isset($request->background_image)) {
            $rules['background_image'] = 'required|image|mimes:jpeg,png,jpg|max:5000';
        }
        if (isset($request->about)) {
            $rules['about'] = 'required|max:4000';
        }
        return $rules;
    }
}
