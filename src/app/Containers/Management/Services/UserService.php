<?php

namespace App\Containers\Management\Services;

use Exception;
use App\Containers\Management\Data\Dto\UserData;
use App\Containers\Management\Data\Repositories\UserRepository;

/**
 * Class UserService
 * @package Modules\User\Data\Services
 */
class UserService
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Create item
     *
     * @param UserData $data
     * @return mixed
     */
    public function createUser(UserData $data): mixed
    {
        try {
            return $this->userRepository->create($data->except('role')->toArray());
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Update item
     *
     * @param UserData $data
     * @param int $uid
     * @return mixed
     */
    public function updateUser(UserData $data, int $uid): mixed
    {
        try {
            return $this->userRepository->update($data->except('role')->toArray(), $uid);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Get list items
     *
     * @return mixed
     */
    public function getUsers()
    {
        return $this->userRepository->orderBy('id', 'desc')->paginate();
    }

    /**
     * Get item by id
     *
     * @param int $uid
     * @return mixed
     */
    public function getUser(int $uid): mixed
    {
        try {
            return $this->userRepository->find($uid);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Remove items
     *
     * @param array $ids
     * @return mixed
     */
    public function deleteUsers(array $ids): mixed
    {
        try {
            return $this->userRepository->deleteWhereIn('id', $ids);
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Get short list items ['id' => 'fullname']
     *
     */
    public function getNameIdUsers()
    {
        return $this->userRepository->pluck('fullname', 'id');
    }

}
