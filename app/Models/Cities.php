<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{

    protected $table = 'cities';

    protected $fillable = ['city_name'];

    public $timestamps = false;

}
