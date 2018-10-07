<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estimation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        's_actor',
        'a_actor',
        'c_actor',
        's_usecase',
        'a_usecase',
        'c_usecase',
        'tef',
        'f_productivity',
        'effort_estimated',
        'request_date',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
