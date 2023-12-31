<?php

namespace App\Http\Controllers\PaymentProvider;

use App\Http\Controllers\Controller;
use App\Contracts\PaymentInterface;
use Illuminate\Http\Request;

class PaypalController extends Controller
{
    private $paymentService;

    public function __construct(PaymentInterface $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function index()
    {
        return response()->json([
            'data' => $this->paymentService->pay(250.0),
        ]);
    }
}
