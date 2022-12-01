<?php

namespace App\Containers\User\Data\Repositories;

use App\Containers\User\Entities\User;
use App\Helpers\Traits\WhereTrait;
use Prettus\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository
{
   // use WhereTrait;

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
