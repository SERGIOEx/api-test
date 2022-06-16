<?php

namespace App\Containers\Auth\Http\Controllers\API;

use App\Containers\Auth\Http\Requests\SignInRequest;
use App\Containers\Auth\Tasks\AuthUserByEmailPasswordTask;
use App\Containers\Auth\Tasks\DeleteTokenTask;
use App\Containers\Auth\Tasks\InitializeTokenTask;
use App\Containers\Auth\Transformers\AuthTransformer;
use App\Core\Core\Exceptions\InternalErrorException;
use App\Core\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

final class AuthController extends ApiController
{

    /**
     * @param SignInRequest $request
     * @return array
     * @throws InternalErrorException
     * @throws \Throwable
     */
    public function login(SignInRequest $request): array
    {
        AuthUserByEmailPasswordTask::run($request->email, $request->password);
        return $this->transform(InitializeTokenTask::run(), AuthTransformer::class);
    }

    /**
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        DeleteTokenTask::run();
        return $this->deleted('ok');
    }

}
