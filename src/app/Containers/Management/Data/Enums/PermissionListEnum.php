<?php

namespace App\Containers\Management\Data\Enums;

final class PermissionListEnum
{
    public const ROLES_INDEX = 'roles.index';
    public const ROLES_CREATE = 'roles.create';
    public const ROLES_DELETE = 'roles.delete';
    public const ROLES_EDIT = 'roles.edit';

    public const PERM_LIST = [
        self::ROLES_INDEX,
        self::ROLES_CREATE,
        self::ROLES_DELETE,
        self::ROLES_EDIT,
    ];
}
