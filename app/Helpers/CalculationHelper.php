<?php

namespace App\Helpers;

/**
 * Description of CalculationHelper
 *
 * @author piotrek
 */
use App\Models\Calculation;

class CalculationHelper
{
    const EXTRA_SHIPPING_COST       = 1995;
    const NO_SHIPPING_COST          = 0;
    const ORDER_AMOUNT_FOR_DISCOUNT = 12500;
    const DISCOUNT                  = 5;
    const NO_DISCOUNT               = 0;

    public function calculate(Calculation $calculationData)
    {
        $calculationData->discount = $this->calculateDiscount($calculationData);
        $calculationData->totalPrice = $this->calculatePrice($calculationData);
        return $calculationData;
    }

    private function calculatePrice(Calculation $calculationData) {
        //$price = $calculationData->price;
        $price = $calculationData->orderAmount;
        $discount    = $this->calculateDiscount($calculationData);
        $longProduct = $this->checkLongProduct($calculationData->longProduct);
        return $price - ($price * ($discount)) + (int)$longProduct;
    }

    private function calculateDiscount(Calculation $calculationData)
    {
        $discount = self::NO_DISCOUNT;
        $orderAmount = (int) $calculationData->orderAmount;
        if ($orderAmount > self::ORDER_AMOUNT_FOR_DISCOUNT) {
            $discount = self::DISCOUNT / 100;
        }
        return $discount;
    }

    private function checkLongProduct($longProduct)
    {
        $shippingCost = self::NO_SHIPPING_COST;
        if ($longProduct) {
            $shippingCost = self::EXTRA_SHIPPING_COST;
        }
        return $shippingCost;
    }
}
