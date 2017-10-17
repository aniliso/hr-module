<?php

namespace Modules\Hr\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Hr\Presenters\PositionPresenter;
use Carbon\Carbon;

class Position extends Model
{
    use Translatable, PresentableTrait;

    protected $table = 'hr__positions';
    public $translatedAttributes = ['name', 'slug', 'job_description', 'qualification'];
    protected $fillable = ['reference_no', 'personal_number', 'start_at', 'end_at', 'status', 'ordering', 'name', 'slug', 'job_description', 'qualification', 'criteria', 'position'];
    protected $casts = [
        'criteria' => 'object',
        'position' => 'object',
    ];
    protected $dates = ['start_at', 'end_at'];
    protected $presenter = PositionPresenter::class;

    public function setStartAtAttribute($value)
    {
        return $this->attributes['start_at'] = Carbon::parse($value);
    }

    public function setEndAtAttribute($value)
    {
        return $this->attributes['end_at'] = Carbon::parse($value);
    }
}
