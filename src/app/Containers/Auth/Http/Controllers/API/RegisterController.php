<?php

namespace App\Containers\Auth\Http\Controllers\API;

use App\Containers\User\Http\Dto\BaseUserParameters;
use App\Containers\Auth\Http\Requests\SignUpRequest;
use App\Containers\User\Tasks\CreateUserTask;
use App\Core\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

final class RegisterController extends ApiController
{

    /**
     * Create new user
     *
     * @throws UnknownProperties
     */
    public function __invoke(SignUpRequest $request): JsonResponse
    {
        CreateUserTask::run(new BaseUserParameters($request->all()));
        return $this->created('User created!');
    }

}
