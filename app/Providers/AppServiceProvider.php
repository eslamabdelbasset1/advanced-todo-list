<?php

namespace App\Providers;

use App\Contracts\ITodoRepositoryService;
use App\Contracts\PaymentInterface;
use App\Http\Controllers\FirewallController;
use App\Http\Controllers\PaymentProvider\PaypalController;
use App\Http\Controllers\PaymentProvider\SquarePayController;
use App\Http\Controllers\PaymentProvider\StripeController;
use App\Services\Filters\FilterService;
use App\Services\Filters\NullFilterService;
use App\Services\PaypalService;
use App\Services\SmsService;
use App\Services\SquarePayService;
use App\Services\StripeService;
use App\Services\TodoRepositoryService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ITodoRepositoryService::class, TodoRepositoryService::class);

        $this->app->when(PaypalController::class)
            ->needs(PaymentInterface::class)
            ->give(PaypalService::class);

        $this->app->when(StripeController::class)
            ->needs(PaymentInterface::class)
            ->give(StripeService::class);

        $this->app->when(SquarePayController::class)
            ->needs(PaymentInterface::class)
            ->give(SquarePayService::class);


        $value = "Eslam";
        $this->app->when(SmsService::class)
            ->needs('$apiKey')
            ->give($value);

        $this->app
            ->when(FirewallController::class)
            ->needs(\App\Contracts\FilterInterface::class)
            ->give(function (){
                return[
                  new FilterService(),
                    new NullFilterService(),
                ];
            });
    }

    /**
     *
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
