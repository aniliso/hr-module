<?php

namespace Modules\Hr\Widgets;


use Modules\Hr\Repositories\PositionRepository;

class HrWidgets
{
    /**
     * @var PositionRepository
     */
    private $position;

    public function __construct(PositionRepository $position)
    {
        $this->position = $position;
    }

    public function positions($limit=20, $view="positions")
    {
        if($positions = $this->position->all()->sortBy('ordering')->take($limit))
        {
            return view('hr::widgets.'.$view, compact('positions'));
        }
    }
}
