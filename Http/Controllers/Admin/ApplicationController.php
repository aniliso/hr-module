<?php

namespace Modules\Hr\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Hr\Entities\Application;
use Modules\Hr\Http\Requests\CreateApplicationRequest;
use Modules\Hr\Http\Requests\UpdateApplicationRequest;
use Modules\Hr\Repositories\ApplicationRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Media\Image\Imagy;
use Modules\Media\Services\FileService;

class ApplicationController extends AdminBaseController
{
    /**
     * @var ApplicationRepository
     */
    private $application;
    /**
     * @var FileService
     */
    private $fileService;
    /**
     * @var Imagy
     */
    private $imagy;

    public function __construct(ApplicationRepository $application, FileService $fileService, Imagy $imagy)
    {
        parent::__construct();

        $this->application = $application;
        $this->fileService = $fileService;
        $this->imagy = $imagy;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $applications = $this->application->all();

        return view('hr::admin.applications.index', compact('applications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('hr::admin.applications.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateApplicationRequest $request
     * @return Response
     */
    public function store(CreateApplicationRequest $request)
    {
        $this->application->create($request->all());

        return redirect()->route('admin.hr.application.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('hr::applications.title.applications')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Application $application
     * @return Response
     */
    public function edit(Application $application)
    {
        return view('hr::admin.applications.edit', compact('application'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Application $application
     * @param  UpdateApplicationRequest $request
     * @return Response
     */
    public function update(Application $application, UpdateApplicationRequest $request)
    {
        $this->application->update($application, $request->all());

        return redirect()->route('admin.hr.application.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('hr::applications.title.applications')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Application $application
     * @return Response
     */
    public function destroy(Application $application)
    {
        if($application->attachment()->exists()) {
            $file = $application->attachment()->first();
            $this->imagy->deleteAllFor($file);
            $application->attachment()->delete();
        }
        $this->application->destroy($application);

        return redirect()->route('admin.hr.application.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('hr::applications.title.applications')]));
    }

    public function export(Application $application)
    {
        header('Content-Type: text/html; charset=utf-8');
        $pdf = \PDF::loadView('hr::pdf.application', ['application'=>$application]);
        return $pdf->download('basvuru_'.$application->id.'.pdf');
    }
}