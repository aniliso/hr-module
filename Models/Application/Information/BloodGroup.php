<?php namespace Modules\Hr\Models\Application\Information;

use Modules\Hr\Models\Contracts\BaseOption;

class BloodGroup extends BaseOption
{
    public function __construct()
    {
        self::$lists = [
            0 => trans('hr::applications.select.blood.0'),
            1 => trans('hr::applications.select.blood.1'),
            2 => trans('hr::applications.select.blood.2'),
            3 => trans('hr::applications.select.blood.3'),
            4 => trans('hr::applications.select.blood.4'),
            5 => trans('hr::applications.select.blood.5'),
            6 => trans('hr::applications.select.blood.6'),
            7 => trans('hr::applications.select.blood.7'),
            8 => trans('hr::applications.select.blood.8')
        ];
    }
}