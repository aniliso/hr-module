<?php namespace Modules\Hr\Models\Application\Information;

use Modules\Hr\Models\Contracts\BaseOption;
use Modules\Localization\Repositories\CountryRepository;

class Nationality extends BaseOption
{
    public function __construct(CountryRepository $country)
    {
        self::$lists = $country->allTranslatedIn('tr')->pluck('name', 'id')->toArray();
    }
}