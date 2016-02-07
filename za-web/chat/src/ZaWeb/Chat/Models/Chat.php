<?php

namespace ZaWeb\Chat\Models;


use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = "chat";

    public $fillable = ['message'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}