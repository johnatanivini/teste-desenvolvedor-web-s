<?php

namespace App\Providers;

use App\Models\Status;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Passport::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Blade::directive('money', function ($money) {
            return "<?php echo number_format($money, 2); ?>";
        });

        Blade::directive('badge_status', function ($code) {

            $status = [
                Status::EM_ANDAMENTO => 'badge-warning',
                Status::PAGO => 'badge-success',
                Status::CANCELADO => 'badge-danger'
            ];

            return  "<?php 
            
            echo $status[$code]
            
            ?>";
            
        });
    }
}
