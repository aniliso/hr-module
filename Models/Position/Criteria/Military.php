<?php

namespace Modules\Hr\Models\Position\Criteria;

use Modules\Hr\Models\Contracts\BaseOption;

class Military extends BaseOption
{
    public function __construct()
    {
        self::$lists = [
            1 => trans('hr::positions.form.select.military.done'),
            2 => trans('hr::positions.form.select.military.probation'),
            3 => trans('hr::positions.form.select.military.exempt')
        ];
    }
}