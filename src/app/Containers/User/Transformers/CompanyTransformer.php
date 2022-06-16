<?php


namespace App\Containers\User\Transformers;

use App\Containers\User\Entities\Company;
use App\Containers\User\Transformers\Responses\UserRelationResponse;
use App\Core\Parents\Transformers\Transformer;

class CompanyTransformer extends Transformer
{

    /**
     * @param Company $item
     * @return array
     */
    public function transform(Company $item): array
    {
        return [
            'title'       => $item->title,
            'phone'       => $item->phone,
            'author'      => UserRelationResponse::get($item->author),
            'description' => $item->description
        ];
    }

}
