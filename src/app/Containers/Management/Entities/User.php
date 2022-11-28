<?php

namespace App\Containers\Management\Entities;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use App\Containers\Management\Data\Enums\UserStatusEnum;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 *
 * @package Modules\User\Entities
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $is_active
 * @property string $remember_token
 */
class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens, HasFactory, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'fullname',
        'phone',
        'avatar',
        'is_active',
        'email',
        'password',
        'email_notify'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Получить роль пользователя
     * @return string
     */
    public function roleName()
    {
        return implode(' ', $this->getRoleNames()->toArray());
    }

    /**
     * @return mixed
     */
    public function statusName()
    {
        return UserStatusEnum::STATUS[$this->is_active];
    }

    /**
     * @param $token
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
}
