<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nottifications extends Model {

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
    public function comment()
    {
        return $this->belongsTo('App\Models\Comments', 'comment_id', 'id');
    }


    public function answers()
    {
        return $this->belongsTo('App\Models\Answer', 'comment_id', 'id');
    }
    **/
    public function type()
    {
        return $this->belongsTo('App\Models\NottifactionTypes', 'obj_type', 'id');
    }
}
