<?php

namespace Modules\Hr\Entities;

use Illuminate\Database\Eloquent\Model;

class PositionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'slug', 'job_description', 'qualification'];
    protected $table = 'hr__position_translations';
}
