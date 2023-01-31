<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
  public const HOME = '/home';

  public function boot()
  {
    $this->configureRateLimiting();
    $this->routes(function () {
      // test
      Route::middleware('web')
        ->group(base_path('routes/web.php'));
      // auth api
      Route::middleware('api')
        ->prefix('api/v1/auth')
        ->group(base_path('routes/v1/auth.php'));
      // usuarios
      Route::middleware('api')
        ->prefix('api/v1/usuarios')
        ->group(base_path('routes/v1/usuarios.php'));
      // usuarios
      Route::middleware('api')
        ->prefix('api/v1/indicadores')
        ->group(base_path('routes/v1/indicadores.php'));
    });
  }

  protected function configureRateLimiting()
  {
    RateLimiter::for('api', function (Request $request) {
      return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
    });
  }
}
