<?php

namespace App\Containers\User\Http\Controllers;

use App\Containers\User\Data\Dto\UserData;
use App\Containers\User\Http\Requests\UserRequest;
use App\Containers\User\Http\Requests\UserUpdateRequest;
use App\Containers\User\Services\UserService;
use App\Containers\User\Transformers\UserFullTransformer;
use App\Containers\User\Transformers\UserSimpleTransformer;
use App\Core\General\Requests\ItemsDeleteRequest;
use App\Core\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use App\Containers\Management\Includes\RoleServiceInc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

final class UserController extends ApiController
{

    public function __construct(protected UserService $userService, protected RoleServiceInc $roleService)
    {
    }

    /**
     * Init ClientData
     *
     * @param Request $r
     * @return UserData
     * @throws UnknownProperties
     */
    protected function initParam(Request $r): UserData
    {
        return new UserData(
            first_name: $r->first_name,
            last_name: $r->last_name,
            email: $r->email,
            phone: $r->phone,
            avatar: $r->avatar,
            password: $r->password,
            role: $r->role,
            is_active: $r->is_active
        );
    }

    public function list(): array
    {
        $users = $this->userService->getUsers();
        return $this->transform($users, UserFullTransformer::class);
    }

    public function simpleList(): array
    {
        $users = $this->userService->getNameIdUsers();
        return $this->transform($users, UserSimpleTransformer::class);
    }

    public function get(int $id): array
    {
        $user = $this->userService->getUser($id);
        return $this->transform($user, UserFullTransformer::class);
    }

    public function store(UserRequest $request): JsonResponse
    {
        try {
            $user = $this->userService->createUser($this->initParam($request));
            $this->roleService->assignRole($user, $request->role);
        } catch (UnknownProperties $e) {

        }

        return $this->created('User created');
    }

    public function update(UserUpdateRequest $request, int $id): JsonResponse
    {
        try {
            $user = $this->userService->updateUser($this->initParam($request), $id);
            $this->roleService->updateIfRoleChange($user, $request->role);
        } catch (UnknownProperties $e) {

        }

        return $this->accepted('User updated');
    }

    public function destroySelected(ItemsDeleteRequest $request): JsonResponse
    {
        $this->userService->deleteUsers($request->ids);

        return $this->deleted('Users selected deleted');
    }

    public function me(): array
    {
        return $this->transform(
            $this->userService->getUser(Auth::user()->id), UserSimpleTransformer::class);
    }

    public function updateProfile(Request $request): JsonResponse
    {
        try {
            $this->userService->updateUser($this->initParam($request), Auth::user()->id);
        } catch (UnknownProperties $e) {

        }

        return $this->accepted('User updated');
    }

}
