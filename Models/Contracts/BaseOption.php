<?php namespace Modules\Hr\Models\Contracts;


abstract class BaseOption implements IOption
{
    protected static $lists;

    public static function get($id)
    {
        if (isset(self::$lists[$id])) {
            return self::$lists[$id];
        }
        return null;
    }

    public static function selected($ids)
    {
        if(is_array($ids)) {
            $inputs = [];
            foreach ($ids as $id) {
                $inputs[] = self::$lists[$id];
            }
            return $inputs;
        }
        return null;
    }

    public static function lists()
    {
        return self::$lists;
    }
}