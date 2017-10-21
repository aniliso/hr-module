<?php

namespace Modules\Hr\Http\Controllers;

use Breadcrumbs;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Hr\Http\Requests\CreateApplicationRequest;
use Modules\Hr\Http\Requests\UpdateApplicationRequest;
use Modules\Hr\Mail\ApplicationCreated;
use Modules\Hr\Repositories\ApplicationRepository;

class PublicController extends BasePublicController
{
    private $application;

    public function __construct(
        ApplicationRepository $application
    )
    {
        parent::__construct();
        $this->application = $application;

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
        return view('hr::index');
    }

    public function form()
    {
        if(setting('hr::user-login')) {
            if ($this->auth->check() === false) {
                return redirect()->guest(config('asgard.user.config.redirect_route_not_logged_in', 'auth/login'))->withError(trans('hr::applications.messages.user login required'));
            }
        }

        $title = trans('hr::applications.title.application');

        $this->setTitle($title)
            ->setDescription('hr::applications.title.description');

        /* Start Breadcrumbs */
        Breadcrumbs::register('hr.application.form', function($breadcrumbs) use ($title) {
            $breadcrumbs->parent('hr.position.index');
            $breadcrumbs->push($title, route('hr.application.form'));
        });
        /* End Breadcrumbs */

        return view('hr::form');
    }
}
