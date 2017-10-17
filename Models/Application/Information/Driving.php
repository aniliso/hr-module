<?php namespace Modules\Hr\Models\Application\Information;

use Modules\Hr\Models\Contracts\BaseOption;

class Driving extends BaseOption
{
    public function __construct()
    {
        self::$lists = [
            '' => trans('hr::applications.select.driver.0'),
            1 => trans('hr::applications.select.driver.1'),
            2 => trans('hr::applications.select.driver.2'),
            3 => trans('hr::applications.select.driver.3'),
            4 => trans('hr::applications.select.driver.4'),
            5 => trans('hr::applications.select.driver.5'),
        ];
    }
}