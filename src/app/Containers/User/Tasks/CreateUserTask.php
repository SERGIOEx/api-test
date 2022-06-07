<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Entities\User;
use App\Containers\User\Http\Dto\BaseUserParameters;

final class CreateUserTask
{
    public static function run(BaseUserParameters $parameters)
    {
        return User::create($parameters->toArray());
    }
}
