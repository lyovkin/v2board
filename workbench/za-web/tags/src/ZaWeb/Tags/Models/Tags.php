<?php

namespace ZaWeb\Tags\Models;

use Illuminate\Database\Eloquent\Model;
use ZaWeb\Tags\Repositories\Tags\TagInterface;

class Tags extends Model implements TagInterface
{
    protected $table = 'tags';

    protected $fillable = [];

    public function adsTags()
    {
        return $this->belongsTo('App\Models\AdsTags');
    }

}
