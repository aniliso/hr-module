<?php namespace Modules\Hr\Models\Position\Information;

use Modules\Hr\Models\Contracts\BaseOption;

class Department extends BaseOption
{
    public function __construct()
    {
        self::$lists = [
            0 => trans('hr::applications.select.select'),
            1  => trans('hr::positions.form.select.department.1'),
            2  => trans('hr::positions.form.select.department.2'),
            3  => trans('hr::positions.form.select.department.3'),
            4  => trans('hr::positions.form.select.department.4'),
            5  => trans('hr::positions.form.select.department.5'),
            6  => trans('hr::positions.form.select.department.6'),
            7  => trans('hr::positions.form.select.department.7'),
            8  => trans('hr::positions.form.select.department.8'),
        ];
    }
}