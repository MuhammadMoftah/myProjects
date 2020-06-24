<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AdminStoreShowroomRequest extends FormRequest
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
            'district_id' => 'required|exists:districtes,id',
            'categories' => 'required|array|min:1',
            'styles' => 'required|array|min:1',
            'categories.*' => 'required|exists:categories,id',
            'styles.*' => 'required|exists:styles,id',
            'user_id' => 'required|exists:users,id',
            'branch_city' => 'required|exists:cities,id',
            'branch_district' => 'required|exists:districtes,id',
            'lat' => 'required',
            'lang' => 'required',
            'slug' => ['required', 'max:300', 'unique:showrooms,slug', 'regex:/^[A-Za-z0-9 _-]{1,100}$/i']
        ];

        if (request('malls')) {
            $rules['malls'] = 'required|array|min:1';
            $rules['malls.*'] = 'required|exists:malls,id';
        }

        // $categories_count = count((array) request('categories'));

        // if ($categories_count > 0) {
        //     foreach (request('categories') as $key => $value) {
        //         $rules['categories.' . $key] = 'required|exists:categories,id';
        //     }
        // }

        // $styles_count = count((array) request('styles'));

        // if ($styles_count > 0) {
        //     foreach (request('styles') as $key => $value) {
        //         $rules['styles.' . $key] = 'required|exists:styles,id';
        //     }
        // }

        if (isset($request->facebook)) {
            $rules['facebook'] = ['required', 'max:200', 'regex:/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/'];
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

        if (request('sunday')) {
            $rules['sunday'] = 'required';
            $rules['working_from_sunday'] = 'required|max:6';
            $rules['working_to_sunday'] = 'required|max:6';
        }

        if (request('monday')) {
            $rules['monday'] = 'required';
            $rules['working_from_monday'] = 'required|max:6';
            $rules['working_to_monday'] = 'required|max:6';
        }

        if (request('tuesday')) {
            $rules['tuesday'] = 'required';
            $rules['working_from_tuesday'] = 'required|max:6';
            $rules['working_to_tuesday'] = 'required|max:6';
        }

        if (request('wednesday')) {
            $rules['wednesday'] = 'required';
            $rules['working_from_wednesday'] = 'required|max:6';
            $rules['working_to_wednesday'] = 'required|max:6';
        }

        if (request('friday')) {
            $rules['friday'] = 'required';
            $rules['working_from_friday'] = 'required|max:6';
            $rules['working_to_friday'] = 'required|max:6';
        }

        if (request('saturday')) {
            $rules['saturday'] = 'required';
            $rules['working_from_saturday'] = 'required|max:6';
            $rules['working_to_saturday'] = 'required|max:6';
        }

        if (request('thursday')) {
            $rules['thursday'] = 'required';
            $rules['working_from_thursday'] = 'required|max:6';
            $rules['working_to_thursday'] = 'required|max:6';
        }

        return $rules;
    }
}
