<?php namespace Modules\Hr\Facades;


use Illuminate\Support\Facades\Facade;
use Modules\Hr\Models\Position\Criteria;

class CriteriaFacades extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Criteria::class;
    }
}