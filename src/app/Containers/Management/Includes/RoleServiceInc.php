<?php

namespace App\Containers\Management\Includes;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Containers\User\Entities\User;
use Spatie\Permission\Models\{Permission, Role};

class RoleServiceInc
{

    /**
     * @param int $id
     * @return mixed
     */
    public function deleteRole(int $id)
    {
        return Role::where('id', $id)->delete();
    }

    /**
     * @param int $id
     * @param string $name
     * @param $permissions
     */
    public function updateRole(int $id, string $name, $permissions)
    {
        $role = Role::find($id);
        $role->name = $name;
        $role->save();

        $role->syncPermissions($permissions);
    }

    /**
     * @param int $id
     * @return \Spatie\Permission\Contracts\Role
     */
    public function getRole(int $id)
    {
        return Role::findById($id);
    }

    /**
     * @param string $name
     * @param $permissions
     * @return mixed
     */
    public function createRole(string $name, $permissions)
    {
        $role = Role::create(['name' => $name]);
        return $role->syncPermissions($permissions);
    }

    /**
     * @return Collection
     */
    public function getRolesList()
    {
        return Role::all()->pluck('name', 'id');
    }

    /**
     * @param User $user
     * @param $roles
     * @return User
     */
    public function assignRole(User $user, $roles)
    {
        return $user->assignRole($roles);
    }

    /**
     * @param User $user
     * @param $roles
     */
    public function updateIfRoleChange(User $user, $roles)
    {
        if (!$user->hasRole($roles)) {
            DB::table('model_has_roles')->where('model_id', $user->id)->delete();
            $this->assignRole($user, $roles);
        }
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function getRoleHasPermissions(int $id)
    {
        return Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->pluck('permissions.name')
            ->all();
    }

}
