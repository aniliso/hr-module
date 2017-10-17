<?php namespace Modules\Hr\Models\Contracts;


interface IOption
{
    public static function lists();
    public static function get($id);
    public static function selected($ids);
}