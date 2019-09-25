<?php

namespace Warcott\Support;

use Warcott\Client;
use Warcott\Form;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Support\ServiceProvider;
use Psr\Container\ContainerInterface;

/**
 * Class LaravelServiceProvider
 * @package Warcott\Support
 */
class LaravelFormServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Boot the service provider.
     */
    public function boot()
    {
        $this->setupViews();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->registerForm();

        $this->app->alias('warcottForm', Form::class);
    }

    /**
     * Register the form instance.
     *
     * @return void
     */
    protected function registerForm(): void
    {
        $this->app->singleton('warcottForm', function ($app) {
            return new Form($app['warcottApi'], $app['view']);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['warcottForm', Form::class];
    }

    /**
     * @return void
     */
    private function setupViews(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'warcott');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../../resources/views' => $this->app->resourcePath('views/vendor/warcott'),
            ], 'warcott');

            $this->publishes([
                __DIR__ . '/../../resources/assets' => public_path('vendor/warcott'),
            ], 'warcott');
        }
    }
}
