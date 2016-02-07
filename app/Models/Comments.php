<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model {

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function advertisement()
    {
        return $this->belongsTo('App\Models\Advertisement');
    }

}
