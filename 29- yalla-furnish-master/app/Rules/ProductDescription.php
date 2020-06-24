<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ProductDescription implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        request()->merge(['description_en' =>    strip_tags( request()->description_en , '<br><p>') ] );  
        request()->merge(['description_ar' =>    strip_tags( request()->description_ar , '<br><p>') ] );  

        $ar_desc = trim(str_replace( ["&nbsp;", "<br>", "<p>", "</p>"] , ["", "", "",""],   request()->description_ar  ));
        $en_desc = trim(str_replace( ["&nbsp;", "<br>", "<p>", "</p>"] , ["", "", "",""],   request()->description_en  )); 
        return $ar_desc == '' ||  $en_desc == ''  ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Empty Description' ;
    }
}
