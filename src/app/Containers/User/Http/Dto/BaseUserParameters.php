<?php

namespace App\Containers\User\Http\Dto;

use Spatie\DataTransferObject\DataTransferObject;

class BaseUserParameters extends DataTransferObject
{

    public string $first_name;
    public string $last_name;
    public string $email;
    public string $phone;

    public ?string $password;
}
