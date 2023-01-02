<?php

namespace App\Containers\User\Data\Dto;

use Spatie\DataTransferObject\DataTransferObject;

class UserProfileData extends DataTransferObject
{
    public string $first_name;
    public string $last_name;

    public string $email;

    public ?string $phone;
    public ?string $avatar;
    public ?string $password;
}
