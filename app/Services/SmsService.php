<?php

namespace App\Services;

use App\Contracts\PaymentInterface;

class SmsService
{
    protected $apiKey;

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }
}
