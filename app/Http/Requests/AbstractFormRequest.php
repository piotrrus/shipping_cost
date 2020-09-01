<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

class AbstractFormRequest extends FormRequest
{
    const ERROR_VALIDATION_DATA = 'Error validation data';

    /**
     * 
     * @param Validator $validator
     * @return type
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        $resp = [
            'error' => self::ERROR_VALIDATION_DATA,
            'validation' => $validator->errors()
        ];
        throw new HttpResponseException(response()->json($resp, 400));
    }
}
