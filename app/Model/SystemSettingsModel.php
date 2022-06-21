<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SystemSettingsModel extends Model
{
    protected $table = 'systemSettings';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
