<?php

namespace App\Containers\Management\Includes;

use App\Containers\Management\Data\Enums\PermissionListEnum;

class PermissionServiceInc
{
    public function getPermissionWithName(): array
    {
        return PermissionListEnum::DESC_LIST_ALL_PERM;
    }
}
