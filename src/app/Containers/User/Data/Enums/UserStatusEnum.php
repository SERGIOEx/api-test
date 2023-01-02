<?php

namespace App\Containers\User\Data\Enums;

enum UserStatusEnum: int
{
    case ACTIVE = 1;
    case NOT_ACTIVE = 0;

    public const STATUS_LIST = [
        self::ACTIVE,
        self::NOT_ACTIVE
    ];
}
