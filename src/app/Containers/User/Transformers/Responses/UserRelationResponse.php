<?php


namespace App\Containers\User\Transformers\Responses;

use App\Containers\User\Entities\User;

final class UserRelationResponse
{

    /**
     * @param User $user
     * @return array
     */
    public static function get(User $user): array
    {
        return [
            'id'       => $user->id,
            'fullname' => $user->fullname
        ];
    }

}
