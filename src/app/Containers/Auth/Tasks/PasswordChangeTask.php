<?php

namespace App\Containers\Auth\Tasks;

use App\Core\Core\Exceptions\InternalErrorException;
use Illuminate\Support\Facades\Password;

final class PasswordChangeTask
{
    /**
     * @param string $email
     * @return string
     * @throws \Throwable
     */
    public static function run(string $email): string
    {

    }
}
