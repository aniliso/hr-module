<?php

namespace Modules\Hr\Entities;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Hr\Presenters\ApplicationPresenter;

class Application extends Model
{
    use PresentableTrait;

    protected $table = 'hr__applications';
    protected $fillable = ['gender', 'first_name', 'last_name', 'nationality', 'marital', 'health', 'criminal', 'request', 'identity', 'driving', 'contact', 'skills', 'education', 'language', 'reference', 'experience', 'course', 'emergency', 'size'];

    protected $casts = [
        'request'    => 'object',
        'identity'   => 'object',
        'driving'    => 'object',
        'contact'    => 'object',
        'skills'     => 'object',
        'education'  => 'object',
        'language'   => 'object',
        'reference'  => 'object',
        'experience' => 'object',
        'course'     => 'object',
        'emergency'  => 'object'
    ];

    protected $presenter = ApplicationPresenter::class;

    public function getIdentityAttribute()
    {
        $attribute = json_decode($this->attributes['identity']);
        !isset($attribute->birthdate) ?: $attribute->birthdate = \Carbon\Carbon::parse($attribute->birthdate);
        return $attribute;
    }
}
