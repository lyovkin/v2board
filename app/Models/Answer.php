<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model {


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function question()
    {
        return $this->belongsTo('Zaweb\Questions\Models\Question');
    }

}
