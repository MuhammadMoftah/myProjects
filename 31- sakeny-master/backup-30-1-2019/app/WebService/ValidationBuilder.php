<?php

namespace App\WebService;

use Illuminate\Contracts\Validation\Validator;

trait ValidationBuilder
{

    # error container
    private $errors = [];

    /**
     * Format the validation errors to be returned.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return array
     */
    protected function formatValidationErrors(Validator $validator)
    {
        $messages = $validator->errors()->getMessages();

        //init index variable to use for autu generate error code
        $index = 100;
        # loop each every error and assign every error into key
        foreach ($messages as $key => $error) {
            $this->buildErrors($key, $error[0], $index);
            $index ++;
        }
        # return list of errors
        return $this->errorResponse();
    }


    /**
     * validation
     * @param  array  $rules            rules
     * @param  array  $messages         custom validation message
     * @param  array  $customAttributes attribue names
     * @return Instance Of validation response
     */
    public function validator(array $rules, array $messages = [], array $customAttributes = [])
    {
        $this->validate(request(), $rules, $messages, $customAttributes);
    }



    private function errorResponse(){
        return [
            'errors'=>$this->getErrors()
        ];
    }


    private function buildErrors($key, $error, $index)
    {
        return array_push($this->errors,$this->buildArray($key, $error, $index));
    }

    private function buildArray($key, $error, $index = 0)
    {
        return [
            'name' => $key,
            'message' => $error,
            'code' => $index
        ];
    }

    private function getErrors()
    {
        return $this->errors;
    }

}
