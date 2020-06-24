<?php

namespace App\WebService;

use Illuminate\Contracts\Validation\Validator;

trait Response
{

    public function buildValidationMessage($key,$error, $index)
    {
        $this->buildErrors($key, $error, $index);
        return $this->response($this->errorResponse(), 422);
    }


    /**
     * inital api stracture
     */
    public function response($data = [] , $httpStatus = 200)
    {
        return response($data, $httpStatus);
    }



}
