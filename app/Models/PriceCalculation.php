<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\PriceCalculation;
use App\Models\Calculation;

class PriceCalculation extends Model
{
    protected $table = 'calculations';

    public static function insert(Calculation $calculationData)
    {
        self::saveIt($calculationData);
    }

    private static function saveIt(Calculation $calculationData)
    {
        $model = new PriceCalculation();

        $model->order_amount = $calculationData->orderAmount;
        $model->order_value  = $calculationData->totalPrice;

        $model->postcode     = $calculationData->postcode;
        $model->long_product = $calculationData->longProduct;
        $model->zone_value   = $calculationData->zone;
        $model->discount     = $calculationData->discount;
        $model->save();
    }
}
