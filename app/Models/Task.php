<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = [];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
