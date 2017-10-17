<?php namespace Modules\Hr\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Hr\Models\Application\Application;

class ApplicationFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Application::class;
    }
}