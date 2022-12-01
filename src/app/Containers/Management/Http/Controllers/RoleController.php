<?php

namespace App\Containers\Management\Http\Controllers;

use App\Containers\Management\Transformers\PermissionListTransformer;
use App\Containers\Management\Transformers\RolesListTransformer;
use App\Core\Parents\Controllers\ApiController;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Containers\Management\Http\Requests\RoleRequest;
use App\Containers\Management\Includes\PermissionServiceInc;
use App\Containers\Management\Includes\RoleServiceInc;


class RoleController extends ApiController
{

    public function __construct(private RoleServiceInc $roleService, private PermissionServiceInc $permissionService)
    {
    }

    public function list(): JsonResponse
    {
        $roles = $this->roleService->getRolesList();
        return $this->json($roles);
    }

    public function permissions(): JsonResponse
    {
        $permissions = $this->permissionService->getPermissionWithName();
        return $this->json($permissions);
    }

    public function store(RoleRequest $request): JsonResponse
    {
        $this->roleService->createRole($request->title, $request->permissions);
        return $this->created('Role created');
    }

    public function get(int $id)
    {
        $role = $this->roleService->getRole($id);
        $permissions = $this->permissionsList;
        $rolePermissions = $this->roleService->getRoleHasPermissions($id);

        return view($this->viewUrl . 'edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(RoleRequest $request, $id): JsonResponse
    {
        $this->roleService->updateRole($id, $request->title, $request->permissions);
        return $this->accepted('Role updated');
    }

    public function destroy(int $id): JsonResponse
    {
        $this->roleService->deleteRole($id);
        return $this->accepted('Role deleted');
    }
}
