<?php

namespace App\Containers\Auth\Tasks;

use App\Core\Core\Exceptions\InternalErrorException;
use Exception;

final class InitializeTokenTask
{
    /**
     * @param string $tokenName
     * @return string
     * @throws InternalErrorException
     * @throws \Throwable
     */
    public static function run(string $tokenName = 'auth_token'): string
    {
        throw_if(!auth()->user(), InternalErrorException::class, 'NEED_AUTH');
        return auth()->user()->createToken($tokenName)->plainTextToken;
    }
}
