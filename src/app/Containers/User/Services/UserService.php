<?php

namespace App\Containers\User\Services;

use Exception;
use App\Containers\User\Data\Dto\UserData;
use App\Containers\User\Data\Repositories\UserRepository;

/**
 * Class UserService
 * @package Modules\User\Data\Services
 */
class UserService
{

    public function __construct(private UserRepository $userRepository)
    {
    }

    public function createUser(UserData $data): mixed
    {
        try {
            return $this->userRepository->create($data->except('role')->toArray());
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function updateUser(UserData $data, int $uid): mixed
    {
        try {
            return $this->userRepository->update($data->except('role')->toArray(), $uid);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function getUsers()
    {
        return $this->userRepository->orderBy('id', 'desc')->paginate();
    }

    public function getUser(int $uid): mixed
    {
        try {
            return $this->userRepository->find($uid);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function deleteUsers(array $ids): mixed
    {
        try {
            return $this->userRepository->deleteWhereIn('id', $ids);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function getNameIdUsers(): array
    {
        return $this->userRepository->pluck('fullname', 'id');
    }

}
