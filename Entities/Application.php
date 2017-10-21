<?php

namespace Modules\Hr\Entities;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Hr\Presenters\ApplicationPresenter;
use Modules\User\Entities\Sentinel\User;

class Application extends Model
{
    use PresentableTrait;

    protected $table = 'hr__applications';
    protected $fillable = ['user_id', 'position_id', 'gender', 'first_name', 'last_name', 'nationality', 'marital', 'health', 'criminal', 'request', 'identity', 'driving', 'contact', 'skills', 'education', 'language', 'reference', 'experience', 'course', 'emergency', 'size'];

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
        'emergency'  => 'object',
        'health'     => 'object',
        'criminal'   => 'object'
    ];

    protected $presenter = ApplicationPresenter::class;

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function position()
    {
        return $this->hasOne(Position::class, 'id', 'position_id');
    }
}
