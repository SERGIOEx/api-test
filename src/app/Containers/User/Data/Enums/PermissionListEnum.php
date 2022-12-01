<?php

namespace App\Containers\User\Data\Enums;

final class PermissionListEnum
{
    public const USERS_INDEX = 'users.index';
    public const USERS_CREATE = 'users.create';
    public const USERS_DELETE = 'users.delete';
    public const USERS_EDIT = 'users.edit';

    public const PERM_LIST = [
        self::USERS_INDEX,
        self::USERS_CREATE,
        self::USERS_DELETE,
        self::USERS_EDIT,
    ];
}
