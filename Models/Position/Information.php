<?php namespace Modules\Hr\Models\Position;

use Modules\Hr\Models\Contracts\BaseOption;
use Modules\Hr\Models\Position\Information\City;
use Modules\Hr\Models\Position\Information\Department;
use Modules\Hr\Models\Position\Information\Level;
use Modules\Hr\Models\Position\Information\WorkTime;

class Information extends BaseOption
{
    public static function level()
    {
        return app(Level::class);
    }

    public static function worktime()
    {
        return app(WorkTime::class);
    }

    public static function department()
    {
        return app(Department::class);
    }

    public static function city()
    {
        return app(City::class);
    }
}