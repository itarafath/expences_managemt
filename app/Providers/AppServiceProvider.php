<?php

namespace App\Providers;

use App\Services\Payment\IPaymentProcessor;
use App\Services\Payment\PaymentProcessor;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IPaymentProcessor::class, PaymentProcessor::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
