<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';

    protected $fillable = ['title','description', 'alias'];


    public function advertisements()
    {
        return $this->hasMany('App\Models\Advertisement','category_id');
    }

    public function attachment()
    {
        return $this->belongsTo('App\Models\Attachment');
    }

    public function adsCount()
    {
        return $this->advertisements()->approved()->count();
    }
}
