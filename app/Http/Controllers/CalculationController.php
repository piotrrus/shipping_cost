<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
// use Illuminate\Http\Request;
use App\Models\Calculation;
use App\Helpers\CalculationHelper;
use App\Http\Requests\CalculationFormRequest;

class CalculationController extends BaseController
{

    public function index()
    {
        return view('calculation-form');
    }

    public function calculate(CalculationFormRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {
            $costCalculation  = new CalculationHelper();
            $calculationData  = $this->setCalculationData($request);

            $calculations = [
                'calculationData' => $calculationData,
                'calculationTotal' => $costCalculation->totalCost($calculationData),
                'discount' => $costCalculation->calculateDiscount($calculationData->orderAmount)
                * 100
            ];
            return view('calculation-result', ['calculations' => $calculations]);
        }
    }

    private function setCalculationData($request)
    {
        $calculationData = new Calculation();
        $long_product    = $request->input('long_product');
        $order_amount    = $request->input('order_amount');
        $postcode        = $request->input('postcode');
        $price           = $request->input('price');

        $calculationData->longProduct = $long_product;
        $calculationData->orderAmount = $order_amount;
        $calculationData->postcode    = $postcode;
        $calculationData->price       = $price;
        return $calculationData;
    }
}
