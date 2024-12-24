<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use Tymon\JWTAuth\JWTAuth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * The namespace for the controller routes.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(JWTAuth::class, function ($app) {
            return new JWTAuth($app['tymon.jwt'], $app['request'], $app['auth']);
        });
    }

    public function boot(): void
    {

        Validator::extend('strong_password', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/[A-Z]/', $value) && preg_match('/[0-9]/', $value) && preg_match('/[\W_]/', $value);
        });

        $this->ensureJwtIsConfigured();
    }

    /**
     * Ensure that JWT Authentication is configured correctly
     */
    protected function ensureJwtIsConfigured()
    {
        if (app()->runningInConsole() && in_array(app('Illuminate\Console\Scheduling\ScheduleRunCommand')->getName(), ['config:clear', 'cache:clear'])) {
            return;
        }

        if (!config('jwt.secret')) {
            throw new \Exception('JWT_SECRET is not set in the .env file. Please generate it using `php artisan jwt:secret`.');
        }

        if (!config('jwt.ttl')) {
            config(['jwt.ttl' => 60]);
        }
    }


    public function map()
    {
        $this->mapApiRoutes();

        // Other route mapping methods...
    }

    /**
     * Map the api routes.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
