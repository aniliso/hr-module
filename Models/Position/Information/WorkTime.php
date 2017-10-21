<?php namespace Modules\Hr\Models\Position\Information;

use Modules\Hr\Models\Contracts\BaseOption;

class WorkTime extends BaseOption
{
    public function __construct()
    {
        self::$lists = [
          0 => trans('hr::positions.form.select.time.select'),
          1 => trans('hr::positions.form.select.time.part_time'),
          2 => trans('hr::positions.form.select.time.full_time')
        ];
    }
}