<?php

namespace Modules\Hr\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreatePositionRequest extends BaseFormRequest
{
    protected $translationsAttributesKey = 'hr::positions.form';

    public function rules()
    {
        return [
            'reference_no'        => 'required',
            'personal_number'     => 'required|integer',
            'ordering'            => 'required|integer',
            'criteria.experience' => 'required|integer',
            'criteria.military'   => 'required|array',
            'criteria.education'  => 'required|array',
            'position.city'       => 'required|array',
            'position.level'      => 'required|integer',
            'position.worktime'   => 'required|integer',
            'start_at'            => 'required:date_format:d.m.Y H:i',
            'end_at'              => 'required:date_format:d.m.Y H:i',
        ];
    }

    public function attributes()
    {
        return [
            'criteria.experience' => trans('hr::positions.form.criteria.experience'),
            'criteria.military'   => trans('hr::positions.form.criteria.military'),
            'criteria.education'  => trans('hr::positions.form.criteria.education'),
            'position.city'       => trans('hr::positions.form.position.city'),
            'position.level'      => trans('hr::positions.form.position.level'),
            'position.worktime'   => trans('hr::positions.form.position.worktime'),
            'start_at'            => trans('hr::positions.form.start_at'),
            'end_at'              => trans('hr::positions.form.end_at'),
        ];
    }

    public function translationRules()
    {
        return [
            'name'            => 'required',
            'slug'            => 'required',
            'job_description' => 'required',
            'qualification'   => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [];
    }
}
