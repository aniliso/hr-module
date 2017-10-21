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
        $this->app['events']->listen(
            BuildingSidebar::class,
            $this->getSidebarClassForModule('Hr', RegisterHrSidebar::class)
        );
        $this->registerFacades();
        $this->app->register(\Barryvdh\DomPDF\ServiceProvider::class);
    }

    public function boot()
    {
        $this->publishConfig('hr', 'permissions');
        $this->publishConfig('hr', 'config');
        $this->publishConfig('hr', 'settings');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
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
