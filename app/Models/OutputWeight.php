<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutputWeight extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'neuron1', 'train_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function rnaTraining()
    {
        return $this->belongsTo(RnaTraining::class);
    }
}
