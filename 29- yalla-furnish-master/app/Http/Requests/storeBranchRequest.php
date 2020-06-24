<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreBranchRequest extends FormRequest
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
            'title' => 'required|max:50',
            'address_en' => 'required|max:200',
            'address_ar' => 'required|max:200',
            'mob1' => 'required|numeric|min:1|digits_between:1,11',
            'mob2' => 'required|numeric|min:1|digits_between:1,11',
            // 'lat' => 'required',
            // 'lang' => 'required',
            'branch_city' => 'required|exists:cities,id',
            'branch_district' => 'required|exists:districtes,id'
        ];

        

        if (request('sunday')) {
            $rules['sunday'] = 'required|in:sunday';
            $rules['working_from_sunday'] = 'required|max:6';
            $rules['working_to_sunday'] = 'required|max:6';
        }

        if (request('monday')) {
            $rules['monday'] = 'required|in:monday';
            $rules['working_from_monday'] = 'required|max:6';
            $rules['working_to_monday'] = 'required|max:6';
        }

        if (request('tuesday')) {
            $rules['tuesday'] = 'required|in:tuesday';
            $rules['working_from_tuesday'] = 'required|max:6';
            $rules['working_to_tuesday'] = 'required|max:6';
        }
        

        if (request('wednesday')) {
            $rules['wednesday'] = 'required|in:wednesday';
            $rules['working_from_wednesday'] = 'required|max:6';
            $rules['working_to_wednesday'] = 'required|max:6';
        }

        if (request('friday')) {
            $rules['friday'] = 'required|in:friday';
            $rules['working_from_friday'] = 'required|max:6';
            $rules['working_to_friday'] = 'required|max:6';
        }

        if (request('saturday')) {
            $rules['saturday'] = 'required|in:saturday';
            $rules['working_from_saturday'] = 'required|max:6';
            $rules['working_to_saturday'] = 'required|max:6';
        }

        if (request('thursday')) {
            $rules['thursday'] = 'required|in:thursday';
            $rules['working_from_thursday'] = 'required|max:6';
            $rules['working_to_thursday'] = 'required|max:6';
        }
 
        return $rules;
    }
}
