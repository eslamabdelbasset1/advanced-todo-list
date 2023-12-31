<?php

namespace App\Services;

use App\Contracts\PaymentInterface;

class SquarePayService implements PaymentInterface
{
    public function pay(float $amount): string
    {
        return "From SquarePayService $amount";
    }
}
