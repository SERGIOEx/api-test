<?php

namespace App\Containers\User\Data\Dto;

use Spatie\DataTransferObject\DataTransferObject;

class UserData extends DataTransferObject
{
    public string $first_name;
    public string $last_name;

    public string $email;
    public ?int $role;

    public bool $is_active = false;

    public ?string $phone;
    public ?string $avatar;
    public ?string $password;
}
