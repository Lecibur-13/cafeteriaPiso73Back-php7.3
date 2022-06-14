<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HistoryTransactionModel extends Model
{
    protected $table = 'history_transaction';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "total",
        "discount",
        "money_cash",
        "points",
        "user_id",
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
