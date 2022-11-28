<?php

namespace App\Containers\Management\Data\Enums;

final class UserStatusEnum
{
    public const ACTIVE = 1;
    public const NOT_ACTIVE = 0;

    public const STATUS = [
        self::ACTIVE     => 'Active',
        self::NOT_ACTIVE => 'Disabled',
    ];
}
