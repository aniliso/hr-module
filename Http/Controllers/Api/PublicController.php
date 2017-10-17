<?php

namespace Modules\Hr\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Hr\Http\Requests\CreateApplicationRequest;
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
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateApplicationRequest $request)
    {
        $this->application->create($request->all());

        return response()->json([
            'success' => true,
            'data'    => $request->all()
        ]);
    }
}
