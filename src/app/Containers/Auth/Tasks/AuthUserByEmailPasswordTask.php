<?php

namespace App\Containers\Auth\Tasks;

use App\Core\Core\Exceptions\InternalErrorException;
use Exception;
use Illuminate\Support\Facades\Auth;

final class AuthUserByEmailPasswordTask
{
    /**
     * @param string $email
     * @param string $password
     * @return string
     * @throws \Throwable
     */
    public static function run(string $email, string $password): string
    {
        throw_if(!Auth::attempt(
            ['email' => $email, 'password' => $password]),
            InternalErrorException::class,
            'Credentials not match'
        );
    }
}
