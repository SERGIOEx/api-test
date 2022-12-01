<?php


namespace App\Containers\User\Transformers;

use App\Containers\User\Entities\User;
use App\Core\Parents\Transformers\Transformer;

class UserFullTransformer extends Transformer
{

    public function transform(User $item): array
    {
        return [
            'id'         => $item->id,
            'is_active'  => $item->is_active,
            'is_confirm' => $item->email_verified_at ? true : false,
            'fullname'   => $item->fullname,
            'email'      => $item->email,
            'phone'      => $item->phone,
            'avatar'     => $item->avatar
        ];
    }

}
