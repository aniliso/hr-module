<?php namespace Modules\Hr\Models\Application;

use Modules\Hr\Models\Application\Information\BloodGroup;
use Modules\Hr\Models\Application\Information\Driving;
use Modules\Hr\Models\Application\Information\EducationStatus;
use Modules\Hr\Models\Application\Information\Gender;
use Modules\Hr\Models\Application\Information\Language;
use Modules\Hr\Models\Application\Information\LanguageStatus;
use Modules\Hr\Models\Application\Information\Marital;
use Modules\Hr\Models\Application\Information\Nationality;
use Modules\Hr\Models\Application\Information\Skill;
use Modules\Hr\Models\Application\Information\SkillLevel;
use Modules\Hr\Models\Contracts\BaseOption;

class Application extends BaseOption
{
    public static function gender()
    {
        return app(Gender::class);
    }

    public static function nationality()
    {
        return app(Nationality::class);
    }

    public static function language()
    {
        return app(Language::class);
    }

    public static function bloodgroup()
    {
        return app(BloodGroup::class);
    }

    public static function marital()
    {
        return app(Marital::class);
    }

    public static function driving()
    {
        return app(Driving::class);
    }

    public static function skill()
    {
        return app(Skill::class);
    }

    public static function educationStatus()
    {
        return app(EducationStatus::class);
    }

    public static function languageStatus()
    {
        return app(LanguageStatus::class);
    }

    public static function skillLevel()
    {
        return app(SkillLevel::class);
    }
}