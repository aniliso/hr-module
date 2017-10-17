<?php

namespace Modules\Hr\Http\Controllers;

use Breadcrumbs;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Hr\Http\Requests\CreateApplicationRequest;
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

    public function create(CreateApplicationRequest $request)
    {
        try
        {
            if($request->ajax() || $request->wantsJson()) {

                if($application = $this->application->create($request->all())) {
                    if($email = setting('hr::email')) {
                        \Mail::to($email)->queue(new ApplicationCreated($application));
                    }
                }

                return response()->json([
                    'success' => true,
                    'message' => trans('hr::applications.messages.success')
                ]);
            }
        }
        catch (\Exception $exception)
        {
            return response()->json([
                'success' => false,
                'message'  => $exception->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
