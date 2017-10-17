<?php namespace Modules\Hr\Models\Position;

use Modules\Hr\Models\Contracts\BaseOption;
use Modules\Hr\Models\Position\Criteria\Education;
use Modules\Hr\Models\Position\Criteria\Experience;
use Modules\Hr\Models\Position\Criteria\Military;

class Criteria extends BaseOption
{
    public static function military()
    {
        return app(Military::class);
    }

    public static function experience()
    {
        return app(Experience::class);
    }

    public static function education()
    {
        return app(Education::class);
    }
}