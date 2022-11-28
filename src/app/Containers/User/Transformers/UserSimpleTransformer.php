<?php


namespace App\Containers\User\Transformers;

use App\Containers\User\Entities\User;
use App\Core\Parents\Transformers\Transformer;

class UserSimpleTransformer extends Transformer
{

    public function transform(User $item): array
    {
        return [
            'id'       => $item->id,
            'username' => $item->fullname,
            'email'    => $item->email,
        ];
    }

}
