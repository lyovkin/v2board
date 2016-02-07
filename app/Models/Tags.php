<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    public $timestamps = false;

    protected $table = 'tags';

    protected $fillable = ['tag_name'];


    public function advertisements()
    {
        return $this->belongsToMany('App\Models\Advertisement',null,'tag_id');
    }

}
