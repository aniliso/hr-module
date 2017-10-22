<?php

namespace Modules\Hr\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Hr\Http\Requests\CreateApplicationRequest;
use Modules\Hr\Http\Requests\UpdateApplicationRequest;
use Modules\Hr\Mail\ApplicationCreated;
use Modules\Hr\Repositories\ApplicationRepository;
use Modules\User\Traits\CanFindUserWithBearerToken;

class PublicController extends BasePublicController
{
    use CanFindUserWithBearerToken;

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
            $user = \Sentinel::login($this->findUserWithBearerToken($request->header('Authorization')));
            if ($user) {
                if (!$application = $this->application->findByAttributes(['user_id' => $user->id])) {
                    throw new \Exception(trans('hr::applications.messages.application not found'));
                }
                return response()->json([
                    'success'      => true,
                    'notification' => trans('hr::applications.messages.load application'),
                    'message'      => json_encode($application)
                ]);
            } else {
                throw new \Exception(trans('user::messages.user not found'));
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
            if ($application = $this->application->create($request->all())) {
                if ($email = setting('hr::email')) {
                    \Mail::to($email)->queue(new ApplicationCreated($application));
                }
            }
            return response()->json([
                'success' => true,
                'message' => trans('hr::applications.messages.success')
            ]);
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
            $user = \Sentinel::login($this->findUserWithBearerToken($request->header('Authorization')));
            if ($user) {
                if (setting('hr::user-login') && $request->get('id') && \Auth::check()) {
                    if ($application = $this->application->find($request->get('id'))) {
                        $this->application->update($application, $request->all());
                    } else {
                        throw new \Exception('Başvuru formu kaydı hatalı');
                    }
                }
            } else {
                throw new \Exception(trans('user::messages.user not found'));
            }
            return response()->json([
                'success' => true,
                'message' => trans('hr::applications.messages.update')
            ]);

        } catch (\Exception $exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
