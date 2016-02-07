<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $table = 'country';

    protected $fillable = ['title'];


    public function cities()
    {
        return $this->hasMany('App\Models\City','country_id');
    }

}
