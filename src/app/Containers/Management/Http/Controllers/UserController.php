<?php

namespace App\Containers\Management\Http\Controllers;

use App\Core\Parents\Controllers\ApiController;
use App\Helpers\UploadFile;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use App\Containers\Management\Data\Dto\UserData;
use App\Containers\Management\Services\UserService;
use App\Containers\Management\Http\Requests\UsersDeleteRequest;
use App\Containers\Management\Http\Requests\UserRequest;
use App\Containers\Management\Http\Requests\UserUpdateRequest;
use App\Containers\Management\Includes\RoleServiceInc;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Containers\Management\Data\Enums\UserStatusEnum;
use Illuminate\Support\Facades\Auth;
use File;
use Illuminate\View\View;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class UserController extends ApiController
{
    /**
     * @var UserService
     */
    protected UserService $userService;

    /**
     * @var RoleServiceInc
     */
    protected RoleServiceInc $roleService;

    /**
     * @var UploadFile
     */
    public UploadFile $uploadFile;
    /**
     * @var mixed
     */
    public mixed $roleList;

    /**
     * @var array|null
     */
    public ?array $statusList;

    /**
     * UserController constructor.
     * @param UserService $userService
     * @param RoleServiceInc $roleService
     * @param UploadFile $upload
     */
    public function __construct(UserService $userService, RoleServiceInc $roleService, UploadFile $upload)
    {
        $this->middleware('auth');
        $this->userService = $userService;
        $this->roleService = $roleService;
        $this->roleList = $this->roleService->getRolesList();
        $this->statusList = UserStatusEnum::STATUS;
        $this->uploadFile = $upload;
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
            fullname: $r->fullname,
            email: $r->email,
            phone: $r->phone,
            avatar: $r->avatar,
            password: $r->password,
            role: $r->role,
            is_active: $r->is_active
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $users = $this->userService->getUsers();
        return view($this->viewUrl . 'index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $roles = $this->roleList;
        $status = $this->statusList;
        return view($this->viewUrl . 'create', compact('roles', 'status'));
    }

    public function store(UserRequest $request): JsonResponse
    {
        try {
            $user = $this->userService->createUser($this->initParam($request));
            $this->roleService->assignRole($user, $request->role);
        } catch (UnknownProperties $e) {

        }

        return $this->accepted('User deleted');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $user = $this->userService->getUser($id);
        $roles = $this->roleList;
        $status = $this->statusList;
        return view($this->viewUrl . 'edit', compact('user', 'roles', 'status'));
    }

    public function update(UserUpdateRequest $request, int $id): JsonResponse
    {
        $user = $this->userService->updateUser($this->initParam($request), $id);
        $this->roleService->updateIfRoleChange($user, $request->role);

        return $this->accepted('User deleted');
    }

    public function destroy(int $id): JsonResponse
    {
        $this->userService->deleteUsers([$id]);
        return $this->deleted('User deleted');
    }

    public function destroySelected(UsersDeleteRequest $request): JsonResponse
    {
        $this->userService->deleteUsers($request->ids);
        return $this->deleted('Users selected deleted');
    }

    /**
     * FIXME: вынести в отдельный контроллер
     * @return View
     */
    public function profile(): View
    {
        $user = $this->userService->getUser(Auth::user()->id);
        return view('management::profile.index', compact('user'));
    }

    /**
     * FIXME: вынести в отдельный контроллер
     * @param Request $request
     * @return RedirectResponse
     * @throws UnknownProperties
     */
    public function updateProfile(Request $request): RedirectResponse
    {
        $data = $this->initParam($request);
        if ($request->avatar) {
            $data->avatar = $this->uploadFile->updateAvatar($request->avatar, 'avatars/');
        }

        $this->userService->updateUser($this->initParam($request), Auth::user()->id);

        return redirect()->route('platform.profile.index');
    }

}
