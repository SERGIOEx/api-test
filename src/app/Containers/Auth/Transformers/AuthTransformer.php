<?php


namespace App\Containers\Auth\Transformers;

use App\Core\Parents\Transformers\Transformer;

class AuthTransformer extends Transformer
{

    /**
     * @param string $token
     * @return array
     */
    public function transform(string $token): array
    {
        return [
            'token' => $token,
            'type'  => 'Bearer'
        ];
    }

}
