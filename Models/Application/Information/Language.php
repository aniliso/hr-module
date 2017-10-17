<?php namespace Modules\Hr\Models\Application\Information;

use Modules\Hr\Models\Contracts\BaseOption;

class Language extends BaseOption
{
    public function __construct()
    {
        self::$lists = [
            '' => trans('hr::applications.select.languages.select'),
            1 => trans('hr::applications.select.languages.english'),
            2 => trans('hr::applications.select.languages.german'),
            3 => trans('hr::applications.select.languages.french'),
            4 => trans('hr::applications.select.languages.spanish'),
            5 => trans('hr::applications.select.languages.russian')
        ];
    }
}