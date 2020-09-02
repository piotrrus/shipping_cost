<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Calculation;
use App\Models\PriceCalculation;
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
            $costCalculation = new CalculationHelper();
            $calculationData = $this->setCalculationData($request);
            $costCalculation->calculate($calculationData);

            $calculations = [
                'calculationData' => $calculationData
            ];

            $response = $this->create($calculationData);

            return view('calculation-result',
                [
                'calculations' => $calculations,
                'response' => $response
            ]);
        }
    }

    /**
     * set calculation data model
     * @param type $request
     * @return Calculation
     */
    private function setCalculationData($request)
    {
        $calculationData = new Calculation();

        $price                  = $request->input('price');
        $priceAndZone           = explode(",", $price);
        $calculationData->zone  = trim($priceAndZone[0]);
        $calculationData->price = trim($priceAndZone[1]);

        $calculationData->longProduct = $request->input('long_product');
        $calculationData->orderAmount = $request->input('order_amount');
        $calculationData->postcode    = $request->input('postcode');
        return $calculationData;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Calculation $calculationData)
    {
        $response = PriceCalculation::insert($calculationData);
        return $this->message($response);
    }
}
