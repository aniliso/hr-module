<?php namespace Modules\Hr\Models\Application\Information;

use Modules\Hr\Models\Contracts\BaseOption;

class EducationStatus extends BaseOption
{
    public function __construct()
    {
        self::$lists = [
            '' => trans('hr::applications.form.educate.statuses.0'),
            1 => trans('hr::applications.form.educate.statuses.1'),
            2 => trans('hr::applications.form.educate.statuses.2'),
            3 => trans('hr::applications.form.educate.statuses.3'),
        ];
    }
}