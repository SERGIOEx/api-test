<?php

namespace App\Containers\Auth\Tasks;

use App\Core\Core\Exceptions\InternalErrorException;
use Illuminate\Support\Facades\Password;

final class PasswordResetLinkTask
{
    /**
     * @param string $email
     * @return string
     * @throws \Throwable
     */
    public static function run(string $email): string
    {
        $status = Password::sendResetLink(['email' => $email]);
        throw_if($status !== Password::RESET_LINK_SENT, InternalErrorException::class, $status);

        return $status;
    }
}
