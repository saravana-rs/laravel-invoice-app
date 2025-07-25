<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\InvoiceCalculator;

class CalculationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(InvoiceCalculator::class, function () {
            return new InvoiceCalculator();
        });
    }
}