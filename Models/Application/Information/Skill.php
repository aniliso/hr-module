<?php namespace Modules\Hr\Models\Application\Information;

use Modules\Hr\Models\Contracts\BaseOption;

class Skill extends BaseOption
{
    public function __construct()
    {
        self::$lists = [
            '' => trans('hr::applications.select.skill.0'),
            1 => trans('hr::applications.select.skill.1'),
            2 => trans('hr::applications.select.skill.2'),
            3 => trans('hr::applications.select.skill.3'),
            4 => trans('hr::applications.select.skill.4'),
            5 => trans('hr::applications.select.skill.5'),
            6 => trans('hr::applications.select.skill.6'),
            7 => trans('hr::applications.select.skill.7'),
        ];
    }
}