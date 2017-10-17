<?php namespace Modules\Hr\Models\Position\Information;

use Modules\Hr\Models\Contracts\BaseOption;

class Level extends BaseOption
{
    public function __construct()
    {
        self::$lists = [
          1 => trans('hr::positions.form.select.level.1'),
          2 => trans('hr::positions.form.select.level.2'),
          3 => trans('hr::positions.form.select.level.3'),
          4 => trans('hr::positions.form.select.level.4'),
          5 => trans('hr::positions.form.select.level.5'),
          6 => trans('hr::positions.form.select.level.6'),
          7 => trans('hr::positions.form.select.level.7'),
        ];
    }
}