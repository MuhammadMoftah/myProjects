<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name_en' => 'required|max:200',
            'name_ar' => 'required|max:200',
            'description_en' => 'required|max:4000',
            'description_ar' => 'required|max:4000',
            'color_id' => 'required|exists:colors,id',
            'material_id' => 'required|exists:materials,id',
            'country_id' => 'required|exists:countries,id',
            'upholstery_id' => 'required|exists:upholsteries,id',
            'style_id' => 'required|exists:styles,id',
            'categories' => 'required|array|min:1|max:3',
            'images' => 'required|array|min:1|max:5',
            'categories.*' => "required|distinct",
            'images.*' => 'required|image|mimes:jpeg,png,jpg|max:5000',
            'branches' => 'required|array|min:1',
            'branches.*' => 'required|distinct',
        ];

        request('others') ? $rules['others'] = 'required|max:4000' : '';
        request('height') ? $rules['height'] = 'numeric|digits_between:1,5|min:1' : '';
        request('depth') ? $rules['depth'] = 'numeric|digits_between:1,5|min:1' : '';
        request('width') ? $rules['width'] = 'numeric|digits_between:1,5|min:1' : '';
        request('guarantee') ? $rules['guarantee'] = 'numeric|digits_between:1,3' : '';
        request('price') ? $rules['price'] = 'numeric|digits_between:1,10|min:1' : '';
        request('showroom_id') && request()->route()->getName() == 'admin.product.create.post' ? $rules['showroom_id'] = 'required|exists:showrooms,id' : '';

        if (request('has_offer')) {
            $rules['discount'] = 'required|numeric|digits_between:1,2|max:99|min:1';
            $rules['valid_date'] = 'required|date_format:Y-m-d H:i|after:today';
            $rules['price'] = 'numeric|digits_between:1,10|min:1';
        }

        $categories_count = count((array) request('categories'));

        if ($categories_count > 0) {
            foreach (request('categories') as $key => $value) {
                $rules['categories.' . $key] = 'required|exists:categories,id';
            }
        }

        $branches_count = count((array) request('branches'));

        if ($branches_count > 0) {
            foreach (request('branches') as $key => $value) {
                $rules['branches.' . $key] = 'required|exists:branches,id';
            }
        }

        // $images_count = count((array) request('images'));

        // if ($images_count > 0) {
        //     foreach (request('images') as $key => $value) {
        //         $rules['images.' . $key] = 'required|image|mimes:jpeg,png,jpg|max:5000';
        //     }
        // }

        
        return $rules;
    }

    
}
