<?php

namespace AppAdmin\Models;

use Illuminate\Database\Eloquent\Model;

class PageName extends Model
{

    protected $table = 'page_name';

    protected $fillable = ['title','route','path','description'];


}
