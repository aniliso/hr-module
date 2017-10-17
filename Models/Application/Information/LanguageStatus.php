<?php namespace Modules\Hr\Models\Application\Information;

use Modules\Hr\Models\Contracts\BaseOption;

class LanguageStatus extends BaseOption
{
    public function __construct()
    {
        self::$lists = [
            1 => trans('hr::applications.select.language.radio.little'),
            2 => trans('hr::applications.select.language.radio.middle'),
            3 => trans('hr::applications.select.language.radio.better')
        ];
    }
}