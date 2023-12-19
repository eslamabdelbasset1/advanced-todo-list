<?php

namespace App\Http\Controllers;

use App\Services\SmsService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected $sms;
    public function __construct(SmsService $sms)
    {
        $this->sms = $sms;
    }
    public function index()
    {
        dd($this->sms);
    }
}
