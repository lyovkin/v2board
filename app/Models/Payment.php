<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model{

    protected $table = 'history_balance';

    protected $fillable = array('description', 'balance', 'operation', 'status', 'uid');

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}