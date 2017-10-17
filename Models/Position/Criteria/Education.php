<?php namespace Modules\Hr\Models\Position\Criteria;

use Modules\Hr\Models\Contracts\BaseOption;

class Education extends BaseOption
{
    public function __construct()
    {
        self::$lists = [
            1 => trans('hr::positions.form.select.education.1'),
            2 => trans('hr::positions.form.select.education.2'),
            3 => trans('hr::positions.form.select.education.3'),
            4 => trans('hr::positions.form.select.education.4'),
            5 => trans('hr::positions.form.select.education.5'),
            6 => trans('hr::positions.form.select.education.6'),
            7 => trans('hr::positions.form.select.education.7'),
            8 => trans('hr::positions.form.select.education.8'),
            9 => trans('hr::positions.form.select.education.9'),
            10 => trans('hr::positions.form.select.education.10'),
            11 => trans('hr::positions.form.select.education.11'),
            12 => trans('hr::positions.form.select.education.12'),
            13 => trans('hr::positions.form.select.education.13'),
        ];
    }
}