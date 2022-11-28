<?php

namespace App\Containers\Management\Data\Repositories;

use App\Helpers\Traits\WhereTrait;
use App\Containers\Management\Entities\User;
use Prettus\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository
{
    use WhereTrait;

    /**
     * Specify Model class name
     *
     * @return string
     */
    function model()
    {
        return User::class;
    }
}
