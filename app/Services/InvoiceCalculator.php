<?php

namespace App\Services;

class InvoiceCalculator
{
   public function calculate(array $items, float $taxPercentage)
    {
        $subtotal = 0;

        foreach ($items as $item) {
            $lineTotal = $item['quantity'] * $item['price_per_item'];
            $subtotal += $lineTotal;
        }

        $taxAmount = $subtotal * ($taxPercentage / 100);
        $total = $subtotal + $taxAmount;

        return [
            'subtotal' => $subtotal,
            'tax_amount' => $taxAmount,
            'total' => $total,
        ];
    }
}
