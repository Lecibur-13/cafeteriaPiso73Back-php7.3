<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MoneyCashModel extends Model
{
    protected $table = "moneyCash";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "user_id",
        "value"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
