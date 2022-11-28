<?php

namespace App\Containers\Management\Http\Controllers;

use App\Containers\Management\Transformers\PermissionListTransformer;
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
    protected RoleServiceInc $roleService;

    protected PermissionServiceInc $permissionService;

    public array $permissionsList;

    public function __construct(RoleServiceInc $service, PermissionServiceInc $permissionService)
    {
        $this->roleService = $service;
        $this->permissionService = $permissionService;
        $this->permissionsList = $this->permissionService->getPermissionWithName();
    }

    public function index()
    {
        $roles = $this->roleService->getRolesList();
        return view($this->viewUrl . 'index', compact('roles'));
    }

    public function create(): array
    {
        $permissions = $this->permissionsList;
        return $this->transform($permissions, PermissionListTransformer::class);
    }

    public function store(RoleRequest $request)
    {
        $this->roleService->createRole($request->title, $request->permissions);
        return $this->created('Role created');
    }

    public function edit(int $id)
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
