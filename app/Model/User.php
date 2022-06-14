<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    public static $snakeAttributes = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_name',
        'mothers_last_name',
        'systemRole_id',
        'role_id',
        "points",
        "status",
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return HasOne
     */
    public function systemRole(): HasOne
    {
        return $this->hasOne(CatSystemUserRoleModel::class, "id", "systemRole_id");
    }

    /**
     * @return HasOne
     */
    public function userRole(): HasOne
    {
        return $this->hasOne(CatUserRoleModel::class, "id", "systemRole_id");
    }

    /**
     * @return HasOne
     */
    public function moneyCash(): HasOne
    {
        return $this->hasOne(MoneyCashModel::class, "user_id", "id");
    }

    /**
     * @return HasMany
     */
    public function AauthAcessToken(): HasMany
    {
        return $this->hasMany(OauthAccessToken::class);
    }
}
