<?php namespace Modules\Hr\Models\Position\Information;

use Modules\Hr\Models\Contracts\BaseOption;
use Modules\Localization\Repositories\CityRepository;

class City extends BaseOption
{
    public function __construct(CityRepository $city)
    {
        self::$lists = collect($city->getByAttributes(['country_id'=>1])->all())->pluck('name', 'id')->toArray();
    }
}