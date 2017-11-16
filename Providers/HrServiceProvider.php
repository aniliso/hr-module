<?php

namespace Modules\Hr\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Traits\CanGetSidebarClassForModule;
use Modules\Hr\Events\Handlers\RegisterHrSidebar;
use Modules\Hr\Facades\ApplicationFacade;
use Modules\Hr\Facades\CriteriaFacades;
use Modules\Hr\Facades\InformationFacades;

class HrServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration, CanGetSidebarClassForModule;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();

        $this->app->extend('asgard.ModulesList', function($app) {
            array_push($app, 'hr');
            return $app;
        });

        $this->app['events']->listen(
            BuildingSidebar::class,
            $this->getSidebarClassForModule('Hr', RegisterHrSidebar::class)
        );
        $this->registerFacades();
        if($this->app->runningInConsole()===false && class_exists(\Barryvdh\DomPDF\ServiceProvider::class)) {
            $this->app->register(\Barryvdh\DomPDF\ServiceProvider::class);
        }
    }

    public function boot()
    {
        $this->publishConfig('hr', 'permissions');
        $this->publishConfig('hr', 'config');
        $this->publishConfig('hr', 'settings');
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        if(! \App::runningInConsole()) {
            \Storage::extend('google', function ($app, $config) {
                $client = new \Google_Client();
                $client->setClientId(setting('hr::clientId') ?? $config['clientId']);
                $client->setClientSecret(setting('hr::clientSecret') ?? $config['clientSecret']);
                $client->refreshToken(setting('hr::refreshToken') ?? $config['refreshToken']);
                $service = new \Google_Service_Drive($client);
                $adapter = new \Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter($service, setting('hr::folderId') ?? $config['folderId']);
                return new \League\Flysystem\Filesystem($adapter);
            });
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        if($this->app->runningInConsole()===false && class_exists(\Barryvdh\DomPDF\ServiceProvider::class)) {
            return [];
        } else {
            return [
                \Barryvdh\DomPDF\ServiceProvider::class
            ];
        }
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Hr\Repositories\PositionRepository',
            function () {
                $repository = new \Modules\Hr\Repositories\Eloquent\EloquentPositionRepository(new \Modules\Hr\Entities\Position());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Hr\Repositories\Cache\CachePositionDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Hr\Repositories\ApplicationRepository',
            function () {
                $repository = new \Modules\Hr\Repositories\Eloquent\EloquentApplicationRepository(new \Modules\Hr\Entities\Application());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Hr\Repositories\Cache\CacheApplicationDecorator($repository);
            }
        );
    }

    private function registerFacades()
    {
        $aliasLoader = AliasLoader::getInstance();
        $aliasLoader->alias('HrCriteria', CriteriaFacades::class);
        $aliasLoader->alias('HrInformation', InformationFacades::class);
        $aliasLoader->alias('HrApplication', ApplicationFacade::class);
        $aliasLoader->alias('PDF', \Barryvdh\DomPDF\Facade::class);
    }
}
