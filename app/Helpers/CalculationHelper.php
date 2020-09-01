<?php

namespace App\Helpers;

/**
 * Description of CalculationHelper
 *
 * @author piotrek
 */
use App\Models\CalculationModel;

class CalculationHelper
{
    const EXTRA_SHIPPING_COST       = 1995;
    const NO_SHIPPING_COST          = 0;
    const ORDER_AMOUNT_FOR_DISCOUNT = 12500;
    const DISCOUNT                  = 5;
    const NO_DISCOUNT               = 0;

    public function totalCost($calculationData)
    {
        $orderAmount = (int) $calculationData->orderAmount;
        $discount    = $this->calculateDiscount($orderAmount);
        $longProduct = $this->checkLongProduct($calculationData->longProduct);
        $price       = $calculationData->price;
        return $price - ($price * ($discount)) + (int)$longProduct;
    }

    public function calculateDiscount($orderAmount)
    {
        $discount = self::NO_DISCOUNT;
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
