<?php

namespace Modules\Hr\Http\Controllers;

use Breadcrumbs;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Hr\Entities\Position;
use Modules\Hr\Repositories\ApplicationRepository;
use Modules\Hr\Repositories\PositionRepository;

class PublicController extends BasePublicController
{
    private $application;
    /**
     * @var PositionRepository
     */
    private $position;

    public function __construct(
        ApplicationRepository $application,
        PositionRepository $position
    )
    {
        parent::__construct();

        $this->application = $application;
        $this->position = $position;

        /* Start Default Breadcrumbs */
        if(!app()->runningInConsole()) {
            Breadcrumbs::register('hr.position.index', function($breadcrumbs) {
                $breadcrumbs->push(trans('hr::hr.title.hr'), route('hr.position.index'));
            });
        }
        /* End Default Breadcrumbs */
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $positions = $this->position->all()->where('status', 1);

        /* Start Meta's */
        $title = trans_choice('hr::positions.title.positions',1);
        $this->setTitle($title)
            ->setDescription($title);
        /* End Meta's */

        return view('hr::position.index', compact('positions'));
    }

    public function view(Position $position)
    {
        if(!isset($position->id)) app()->abort('404');

        $title = trans_choice('hr::positions.title.positions',0).' '.$position->name.'-'.$position->reference_no;
        $this->setTitle($title)
             ->setDescription($title);

        /* Start Breadcrumbs */
        Breadcrumbs::register('hr.position.view', function($breadcrumbs) use ($position) {
            $breadcrumbs->parent('hr.position.index');
            $breadcrumbs->push(trans_choice('hr::positions.title.positions',1), route('hr.position.index'));
            $breadcrumbs->push($position->name, route('hr.position.view', [$position->slug]));
        });
        /* End Breadcrumbs */

        return view('hr::position.view', compact('position'));
    }

    public function form(Request $request)
    {
        if(setting('hr::user-login')) {
            if ($this->auth->check() === false) {
                return redirect()->guest(config('asgard.user.config.redirect_route_not_logged_in', 'auth/login'))->withError(trans('hr::applications.messages.user login required'));
            }
        }

        if($request->has('position_id')) {
            $position = $this->position->find($request->get('position_id'));
        }

        /* Start Meta's */
        $title = trans('hr::applications.title.application');
        $this->setTitle($title)
            ->setDescription('hr::applications.title.description');
        /* End Meta's */

        /* Start Breadcrumbs */
        Breadcrumbs::register('hr.application.form', function($breadcrumbs) use ($title) {
            $breadcrumbs->parent('hr.position.index');
            $breadcrumbs->push($title, route('hr.application.form'));
        });
        /* End Breadcrumbs */

        return view('hr::application.form', compact('position'));
    }
}
