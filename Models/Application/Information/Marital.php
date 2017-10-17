<?php namespace Modules\Hr\Models\Application\Information;

use Modules\Hr\Models\Contracts\BaseOption;

class Marital extends BaseOption
{
    public function __construct()
    {
        self::$lists = [
           1 => trans('hr::applications.select.marital.1'),
           2 => trans('hr::applications.select.marital.2')
        ];
    }
}