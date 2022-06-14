<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CatSystemUserRoleModel extends Model
{
    protected $table = 'cat_systemUserRole';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "name",
        "description",
        "code",
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

}
