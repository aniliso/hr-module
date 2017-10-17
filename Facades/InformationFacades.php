<?php namespace Modules\Hr\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\Hr\Models\Position\Information;

class InformationFacades extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Information::class;
    }
}