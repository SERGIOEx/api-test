<?php

namespace App\Containers\Auth\Tasks;

final class DeleteTokenTask
{
    /**
     * @return mixed
     */
    public static function run()
    {
        return auth()->user()->tokens()->delete();
    }
}
