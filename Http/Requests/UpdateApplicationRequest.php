<?php

namespace Modules\Hr\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;
use Illuminate\Http\Response;

class UpdateApplicationRequest extends BaseFormRequest
{
    protected $translationsAttributesKey = 'hr::positions.form';

    public function rules()
    {
        $rules = [
            'first_name'             => 'required',
            'last_name'              => 'required',
            'identity.no'            => 'required',
            'identity.birthdate'     => 'required',
            'identity.birthplace'    => 'required',
            'contact.address1'       => 'required',
            'contact.county'         => 'required',
            'contact.phone'          => 'required',
            'contact.gsm'            => 'required',
            'contact.email'          => 'required|email',
            'language.*.lang'        => 'required_with:language.*.write,language.*.read,language.*.speak',
            'language.*.write'       => 'required_with:language.*.lang',
            'language.*.read'        => 'required_with:language.*.lang',
            'language.*.speak'       => 'required_with:language.*.lang',
            'skills.*.program'       => 'required_with:skills.*.level',
            'skills.*.other'         => 'required_if:skills.*.program,7',
            'skills.*.level'         => 'required_with:skills.*.program',
            'driving.type'           => 'required_with:driving.no,driving.issue_at',
            'driving.no'             => 'required_with:driving.type',
            'driving.issue_at'       => 'required_with:driving.type',
            'education.*.name'       => 'required_with:education.*.start_at,education.*.status',
            'education.*.status'     => 'required_with:education.*.name,education.*.start_at',
            'education.*.start_at'   => 'required_with:education.*.name,education.*.status',
            'emergency.*.full_name'  => 'required_with:emergency.*.phone',
            'emergency.*.phone'      => 'required_with:emergency.*.full_name',
            'reference.*.full_name'  => 'required_with:reference.*.phone,reference.*.work_place',
            'reference.*.phone'      => 'required_with:reference.*.full_name,reference.*.work_place',
            'reference.*.work_place' => 'required_with:reference.*.full_name,reference.*.phone',
            'course.*.name'          => 'required_with:course.*.company,course.*.issue_at',
            'course.*.company'       => 'required_with:course.*.name,course.*.issue_at',
            'course.*.issue_at'      => 'required_with:course.*.name,course.*.company',
            'experience.*.start_at'  => 'required_with:experience.*.end_at,experience.*.start_at,experience.*.company',
            'experience.*.end_at'    => 'required_with:experience.*.start_at,experience.*.end_at,experience.*.company',
            'experience.*.company'   => 'required_with:experience.*.start_at,experience.*.end_at',
            'experience.*.department'=> 'required_with:experience.*.start_at,experience.*.end_at,experience.*.company',
            'experience.*.position'  => 'required_with:experience.*.start_at,experience.*.end_at,experience.*.company',
            'experience.*.reason'    => 'required_with:experience.*.start_at,experience.*.end_at,experience.*.company',
            'experience.*.full_name' => 'required_with:experience.*.start_at,experience.*.end_at,experience.*.company',
            'experience.*.title'     => 'required_with:experience.*.start_at,experience.*.end_at,experience.*.company',
            'experience.*.phone'     => 'required_with:experience.*.start_at,experience.*.end_at,experience.*.company',
        ];

        if(!setting('hr::user-login')) {
            $rules = array_merge($rules, array('captcha_hr' => 'required|captcha'));
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'first_name'             => trans('hr::applications.form.first_name'),
            'last_name'              => trans('hr::applications.form.last_name'),
            'identity.no'            => trans('hr::applications.form.identity.no'),
            'identity.birthdate'     => trans('hr::applications.form.identity.birthdate'),
            'identity.birthplace'    => trans('hr::applications.form.identity.birthplace'),
            'language.*.lang'        => trans('hr::applications.form.language'),
            'language.*.write'       => trans('hr::applications.form.languages.write'),
            'language.*.read'        => trans('hr::applications.form.languages.read'),
            'language.*.speak'       => trans('hr::applications.form.languages.speak'),
            'contact.address1'       => trans('hr::applications.form.contacts.address1'),
            'contact.county'         => trans('hr::applications.form.contacts.county'),
            'contact.phone'          => trans('hr::applications.form.contacts.phone'),
            'contact.gsm'            => trans('hr::applications.form.contacts.gsm'),
            'contact.email'          => trans('hr::applications.form.contacts.email'),
            'skills.*.program'       => trans('hr::applications.select.skills.program'),
            'skills.*.level'         => trans('hr::applications.select.skills.level'),
            'skills.*.other'         => trans('hr::applications.select.skills.other'),
            'driving.type'           => trans('hr::applications.form.driver.type'),
            'driving.no'             => trans('hr::applications.form.driver.no'),
            'driving.issue_at'       => trans('hr::applications.form.driver.issue_at'),
            'education.*.name'       => trans('hr::applications.form.educate.name'),
            'education.*.status'     => trans('hr::applications.form.educate.status'),
            'education.*.start_at'   => trans('hr::applications.form.educate.start_at'),
            'emergency.*.full_name'  => trans('hr::applications.form.emergencies.full_name'),
            'emergency.*.phone'      => trans('hr::applications.form.emergencies.phone'),
            'reference.*.full_name'  => trans('hr::applications.form.references.full_name'),
            'reference.*.work_place' => trans('hr::applications.form.references.work_place'),
            'reference.*.phone'      => trans('hr::applications.form.references.phone'),
            'course.*.name'          => trans('hr::applications.form.courses.name'),
            'course.*.company'       => trans('hr::applications.form.courses.company'),
            'course.*.issue_at'      => trans('hr::applications.form.courses.date'),
            'captcha_hr'             => trans('hr::applications.form.recaptcha'),
            'experience.*.start_at'  => trans('hr::applications.form.experiences.start_at'),
            'experience.*.end_at'    => trans('hr::applications.form.experiences.end_at'),
            'experience.*.company'   => trans('hr::applications.form.experiences.start_at'),
            'experience.*.department'=> trans('hr::applications.form.experiences.start_at'),
            'experience.*.position'  => trans('hr::applications.form.experiences.start_at'),
            'experience.*.reason'    => trans('hr::applications.form.experiences.start_at'),
            'experience.*.full_name' => trans('hr::applications.form.experiences.start_at'),
            'experience.*.title'     => trans('hr::applications.form.experiences.start_at'),
            'experience.*.phone'     => trans('hr::applications.form.experiences.start_at'),
        ];
    }

    public function translationRules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return trans('validation');
    }

    public function translationMessages()
    {
        return [];
    }

    public function response(array $errors)
    {
        return response()->json([
            'success' => false,
            'message' => $errors
        ], Response::HTTP_BAD_REQUEST);
    }
}
