<?php namespace Modules\Hr\Presenters;

use Modules\Core\Presenters\BasePresenter;
use Carbon\Carbon;

class ApplicationPresenter extends BasePresenter
{
    public function fullname()
    {
        return $this->entity->first_name . ' ' . $this->entity->last_name;
    }
    public function gender()
    {
        if(isset($this->entity->gender)) {
            return \HrApplication::gender()->get($this->entity->gender);
        }
        return null;
    }
    public function marital()
    {
        if(isset($this->entity->marital)) {
            return \HrApplication::marital()->get($this->entity->marital);
        }
        return null;
    }
    public function health()
    {
        if(isset($this->entity->health->status)) {
            $status = $this->entity->health->status == 0 ? 'Hayır' : $this->entity->health->desc;
        } else {
            $status = "Hayır";
        }
        return $status;
    }
    public function criminal()
    {
        if(isset($this->entity->criminal->status)) {
            $status = $this->entity->criminal->status == 0 ? 'Hayır' : $this->entity->criminal->desc;
        } else {
            $status = "Hayır";
        }
        return $status;
    }
    public function request($field="")
    {
        if($field == 'department' && isset($this->entity->request->{$field})) {
            return \HrInformation::department()->get($this->entity->request->{$field});
        }
        if($field == 'work_time' && isset($this->entity->request->{$field})) {
            return \HrInformation::worktime()->get($this->entity->request->{$field});
        }
        if($field == 'travel' && isset($this->entity->request->{$field})) {
            return $this->entity->request->{$field} == 1 ? trans('hr::applications.select.no') : trans('hr::applications.select.yes');
        }
        if($field == 'job_rotation' && isset($this->entity->request->{$field})) {
            return $this->entity->request->{$field} == 1 ? trans('hr::applications.select.no') : trans('hr::applications.select.yes');
        }
        if(isset($this->entity->request->{$field})) {
            return $this->entity->request->{$field};
        }
        return null;
    }
    public function references()
    {
        if(isset($this->entity->reference)) {
            $references = collect($this->entity->reference);
            return $references->map(function($reference) {
                return $reference;
            });
        }
        return null;
    }
    public function emergency()
    {
        if(isset($this->entity->emergency)) {
            $emergencies = collect($this->entity->emergency);
            return $emergencies->map(function($emergency) {
                return $emergency;
            });
        }
        return null;
    }
    public function experience()
    {
        if(isset($this->entity->experience)) {
            $experiences = collect($this->entity->experience);
            return $experiences->map(function($experience) {
                if(isset($experience->start_at)) {
                    $experience->start_at = Carbon::parse($experience->start_at)->format('d/m/Y');
                }
                if(isset($experience->end_at)) {
                    $experience->end_at = Carbon::parse($experience->end_at)->format('d/m/Y');
                }
                return $experience;
            });
        }
        return null;
    }
    public function courses()
    {
        if(isset($this->entity->course)) {
            $courses = collect($this->entity->course);
            return $courses->map(function($course) {
                if(isset($course->issue_at)) {
                    $course->issue_at = Carbon::parse($course->issue_at)->format('d/m/Y');
                } else {
                    $course = new \stdClass();
                    $course->issue_at = null;
                }
                if(!isset($course->name)) $course->name = null;
                if(!isset($course->company)) $course->company = null;
                return $course;
            });
        }
        return null;
    }
    public function skills()
    {
        if(isset($this->entity->skills)) {
            $skills = collect($this->entity->skills);
            return $skills->map(function($skill){
                if(isset($skill->program)) {
                    $skill->program = $skill->program == 7 ? $skill->other : \HrApplication::skill()->get($skill->program);
                } else {
                    $skill = new \stdClass();
                    $skill->program = null;
                }
                if(isset($skill->level)) {
                    $skill->level = \HrApplication::skillLevel()->get($skill->level);
                } else {
                    $skill->level = null;
                }
                return $skill;
            });
        }
        return null;
    }
    public function language()
    {
        if(isset($this->entity->language)) {
            $languages = collect($this->entity->language);
            return $languages->map(function($language) {
                isset($language->lang) ? $language->lang = \HrApplication::language()->get($language->lang) : $language->lang = null;
                isset($language->write) ? $language->write = \HrApplication::languageStatus()->get($language->write) : $language->write = null;
                isset($language->read) ? $language->read = \HrApplication::languageStatus()->get($language->read) : $language->read = null;
                isset($language->speak) ? $language->speak = \HrApplication::languageStatus()->get($language->speak) : $language->speak = null;
                return $language;
            });
        }
        return null;
    }
    public function education()
    {
        if(isset($this->entity->education)) {
            $educations = collect($this->entity->education);
            return $educations->map(function($education) {
                if(isset($education->start_at)) {
                    $education->start_at = Carbon::parse($education->start_at)->format('d/m/Y');
                } else {
                    $education->start_at = null;
                }
                if(isset($education->end_at)) {
                    $education->end_at = Carbon::parse($education->end_at)->format('d/m/Y');
                } else {
                    $education->end_at = null;
                }
                if(isset($education->status)) {
                    $education->status = \HrApplication::educationstatus()->get($education->status);
                } else {
                    $education->status = null;
                }
                if(!isset($education->name)) {
                    $education->name = null;
                }
                if(!isset($education->branch)) {
                    $education->branch = null;
                }
                return $education;
            });
        }
        return null;
    }
    public function contact($field="")
    {
        if($field == 'address') {
            $contact = ' ';
            $contact .= !isset($this->entity->contact->address1) ? '' : $this->entity->contact->address1;
            $contact .= ' ';
            $contact .= !isset($this->entity->contact->address2) ? '' : $this->entity->contact->address2;
            $contact .= ' ';
            $contact .= !isset($this->entity->contact->postcode) ? '' : $this->entity->contact->postcode;
            $contact .= ' ';
            $contact .= !isset($this->entity->contact->county) ? '' : $this->entity->contact->county;
            $contact .= ' ';
            $contact .= !isset($this->entity->contact->city) ? '' : \HrInformation::city()->get($this->entity->contact->city);
            return $contact;
        }
        if(isset($this->entity->contact->{$field})) {
            return $this->entity->contact->{$field};
        }
        return null;
    }
    public function identity($field="")
    {
        if($field == 'birthdate' && isset($this->entity->identity->{$field})) {
            return Carbon::parse($this->entity->identity->{$field})->format('d/m/Y');
        }
        if($field == 'birthplace' && isset($this->entity->identity->{$field})) {
            return \HrInformation::city()->get($this->entity->identity->{$field});
        }
        if($field == 'blood_group' && isset($this->entity->identity->{$field})) {
            return \HrApplication::bloodgroup()->get($this->entity->identity->{$field});
        }
        if(isset($this->entity->identity->{$field})) {
            return $this->entity->identity->{$field};
        }
        return null;
    }
    public function driver($field="")
    {
        if($field == 'type' && isset($this->entity->driving->{$field})) {
            return \HrApplication::driving()->get($this->entity->driving->{$field});
        }
        if($field == 'issue_at' && isset($this->entity->driving->{$field})) {
            return Carbon::parse($this->entity->driving->{$field})->format('Y');
        }
        if(isset($this->entity->driving->{$field})) {
            return $this->entity->driving->{$field};
        }
        return null;
    }
}