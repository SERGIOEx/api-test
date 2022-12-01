<?php

namespace App\Containers\User\Data\Enums;

final class UserStatusEnum
{
    public const ACTIVE = 1;
    public const NOT_ACTIVE = 0;

    public const STATUS_LIST = [
        self::ACTIVE,
        self::NOT_ACTIVE
    ];
}
