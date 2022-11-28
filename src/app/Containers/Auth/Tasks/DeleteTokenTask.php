<?php

namespace App\Containers\Auth\Tasks;

final class DeleteTokenTask
{
    public static function run()
    {
        if (auth()->user()) {
            auth()->user()->tokens()->delete();
        }
    }
}
