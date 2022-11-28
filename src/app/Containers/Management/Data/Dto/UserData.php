<?php

namespace App\Containers\Management\Data\Dto;

use Spatie\DataTransferObject\DataTransferObject;

class UserData extends DataTransferObject
{
    public string $fullname;
    public string $email;
    public ?int $role;

    public bool $is_active = false;

    public ?string $phone;
    public ?string $avatar;
    public ?string $password;
}
