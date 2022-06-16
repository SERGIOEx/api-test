<?php

namespace App\Containers\User\Http\Dto;

use Spatie\DataTransferObject\DataTransferObject;

class BaseCompanyParameters extends DataTransferObject
{
    public string $title;
    public string $phone;

    public ?int $author_id;
    public ?string $description;
}
