<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Favorites
 * @package App\Models
 */
class Favorites extends Model{

    protected $table = 'favorites';

    protected $fillable = []; //

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function advertisement()
    {
        return $this->belongsTo('App\Models\Advertisement');
    }
}