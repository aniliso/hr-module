<?php

namespace Modules\Hr\Http\Controllers\Api;

use DaveJamesMiller\Breadcrumbs\Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
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
    }

    public function view(Request $request)
    {
        try {
            if (\Sentinel::check()) {
                if (!$application = $this->application->findByAttributes(['user_id' => \Sentinel::getUser()->id])) {
                    throw new \Exception('İş Başvuru Formu kaydınızı lütfen doldurunuz');
                }
                return response()->json([
                    'success' => true,
                    'message' => json_encode($application)
                ]);
            } else {
                throw new \Exception('Üye girişi yapmanız gerekiyor');
            }
        } catch (\Exception $exception) {
            return response()->json([
                'success' => true,
                'message' => $exception->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function create(CreateApplicationRequest $request)
    {
        try {
            if ($request->ajax() || $request->wantsJson()) {
                if ($application = $this->application->create($request->all())) {
                    if ($email = setting('hr::email')) {
                        \Mail::to($email)->queue(new ApplicationCreated($application));
                    }
                }
                return response()->json([
                    'success' => true,
                    'message' => trans('hr::applications.messages.success')
                ]);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function update(UpdateApplicationRequest $request)
    {
        try {
            if ($request->ajax() || $request->wantsJson()) {
                if (setting('hr::user-login') && $request->get('id') && \Auth::check()) {
                    if ($application = $this->application->find($request->get('id'))) {
                        $this->application->update($application, $request->all());
                    } else {
                        throw new \Exception('Kullanıcı kaydı hatalı');
                    }
                }
                return response()->json([
                    'success' => true,
                    'message' => trans('hr::applications.messages.update')
                ]);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
