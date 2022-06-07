<?php

namespace App\Containers\Auth\Services;


use App\Containers\Auth\Tasks\CreateUserTask;
use Dto\BaseUserParameters;

class RegisterService
{

    /**
     * @param BaseUserParameters $parameters
     * @return mixed
     */
    public function registerUser(BaseUserParameters $parameters)
    {
        return CreateUserTask::run($parameters);
    }

}
