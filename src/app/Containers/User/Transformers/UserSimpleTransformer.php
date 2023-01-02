<?php


namespace App\Containers\User\Transformers;

use App\Containers\User\Entities\User;
use App\Core\Parents\Transformers\Transformer;

class UserSimpleTransformer extends Transformer
{

    public function transform(User $item): array
    {
        return [
            'id'            => $item->id,
            'role'          => $item->roleName(),
            'fullname'      => $item->fullname,
            'first_name'    => $item->first_name,
            'last_name'     => $item->last_name,
            'email'         => $item->email,
            'phone'         => $item->phone,
            'notifications' => true
        ];
    }

}
