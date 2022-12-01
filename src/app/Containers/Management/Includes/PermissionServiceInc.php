<?php

namespace App\Containers\Management\Includes;

use App\Containers\Management\Data\Enums\PermissionListEnum as RolePermissions;
use App\Containers\User\Data\Enums\PermissionListEnum as UserPermissions;

class PermissionServiceInc
{
    public function getPermissionWithName(): array
    {
        return [
            'role' => RolePermissions::PERM_LIST,
            'user' => UserPermissions::PERM_LIST
        ];
    }
}
