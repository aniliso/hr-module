<?php namespace Modules\Hr\Models\Application\Information;

use Modules\Hr\Models\Contracts\BaseOption;

class Gender extends BaseOption
{
    public function __construct()
    {
        self::$lists = [
            1 => trans('hr::applications.select.gender.male'),
            2 => trans('hr::applications.select.gender.female'),
        ];
    }
}