<?php

namespace App\Providers;

use App\Interfaces\GradeCalculatorInterface as InterfacesGradeCalculatorInterface;
use App\Services\WeightedGradeCalculator as ServicesWeightedGradeCalculator;
use GradeCalculatorInterface;
use Illuminate\Support\ServiceProvider;
use WeightedGradeCalculator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(InterfacesGradeCalculatorInterface::class, ServicesWeightedGradeCalculator::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
    
}
