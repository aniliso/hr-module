<?php namespace Modules\Hr\Models\Application\Information;

use Modules\Hr\Models\Contracts\BaseOption;

class SkillLevel extends BaseOption
{
    public function __construct()
    {
        self::$lists = [
            1 => trans('hr::applications.select.skills.radio.little'),
            2 => trans('hr::applications.select.skills.radio.middle'),
            3 => trans('hr::applications.select.skills.radio.good'),
            4 => trans('hr::applications.select.skills.radio.better')
        ];
    }
}