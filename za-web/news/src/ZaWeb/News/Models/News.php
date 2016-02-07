<?php

namespace ZaWeb\News\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    
    protected $table = 'news';
    
    protected $fillable = [];
    
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function attachment()
    {
        return $this->belongsTo('App\Models\Attachment');
    }
    
    public function categories()
    {
        return $this->belongsTo('App\Models\Categories');
    }
    
    public function tags()
    {
        return $this->belongsTo('App\Models\Tags');
    }
}
