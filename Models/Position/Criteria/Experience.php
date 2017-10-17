<?php

namespace Modules\Hr\Models\Position\Criteria;

use Modules\Hr\Models\Contracts\BaseOption;

class Experience extends BaseOption
{
    public function __construct()
    {
        self::$lists = [
            0 => trans('hr::positions.form.select.no_experience'),
            1 => trans('hr::positions.form.select.experience', ['year'=>1]),
            2 => trans('hr::positions.form.select.experience', ['year'=>2]),
            3 => trans('hr::positions.form.select.experience', ['year'=>3]),
            4 => trans('hr::positions.form.select.experience', ['year'=>4]),
            5 => trans('hr::positions.form.select.experience', ['year'=>5])
        ];
    }
}