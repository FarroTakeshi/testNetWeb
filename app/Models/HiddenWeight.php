<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HiddenWeight extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'neuron1', 'neuron2', 'neuron3', 'train_id',
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
