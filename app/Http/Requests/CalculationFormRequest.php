<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * Description of CalculationFormRequest
 *
 * @author piotrek FormRequest //
 */
class CalculationFormRequest extends FormRequest
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
        return [
            'order_amount' => 'bail|required|integer',
            'postcode' => 'required|digits:5',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'order_amount.required' => 'Order amount is required',
            'order_amount.integer' => 'Order amount have to be number',
            'postcode.required' => 'A postcode is required',
            'postcode.digits' => 'A postcode must have 5 digits',
        ];
    }
}
