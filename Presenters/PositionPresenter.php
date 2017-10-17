<?php namespace Modules\Hr\Presenters;

use Modules\Core\Presenters\BasePresenter;
use Modules\Hr\Models\Position\Criteria;
use Modules\Hr\Models\Position\Information;
use Modules\Localization\Entities\City;

class PositionPresenter extends BasePresenter
{
    private $information;
    private $criteria;

    public function __construct($entity)
    {
        parent::__construct($entity);
        $this->information = app(Information::class);
        $this->criteria = app(Criteria::class);
    }

    public function position($field="")
    {
        if(isset($this->entity->position->{$field})) {
            if($field == "city" && isset($this->entity->position->city)) {
                $cities = City::whereIn('id', $this->entity->position->city)->get()->pluck('name', 'id')->toArray();
                if(count($cities)>0) {
                    return implode(', ', $cities);
                }
                return null;
            } elseif(isset($this->entity->position->{$field})) {
                if(count($this->entity->position->{$field})>0) {
                    $information = $this->information->{$field}()->selected($this->entity->position->{$field});
                    if(count($information)>0) {
                        return implode(', ', $information);
                    }
                }
                $information = $this->information->{$field}()->get($this->entity->position->{$field});
                return $information;
            }
        }
        return null;
    }

    public function criteria($field="")
    {
        if(isset($this->entity->criteria->{$field})) {
            if(count($this->entity->criteria->{$field})>0) {
                $criteria = $this->criteria->{$field}()->selected($this->entity->criteria->{$field});
                if(count($criteria)>0) {
                    return implode(', ', $criteria);
                }
            }
            $criteria = $this->criteria->{$field}()->get($this->entity->criteria->{$field});
            return $criteria;
        }
        return null;
    }
}