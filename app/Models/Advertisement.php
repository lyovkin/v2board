<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    
    protected $table = 'advertisement';
    
    protected $fillable = ['title', 'category_id', 'phone', 'text', 'user_id', 'city_id', 'attachment_hash', 'price', 'rating', 'type_id', 'top' => 1];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
        
    public function profile()
    {
        return $this->belongsTo('ZaWeb\Profile\Models\Profile', 'user_id', 'id');
    }
    
    public function attachment()
    {
        return $this->belongsTo('App\Models\Attachment');
    }
    
    public function city()
    {
        return $this->belongsTo('App\Models\Cities');
    }
    
    public function ads_attachment()
    {

        return $this->hasMany('App\Models\AdsAttachment', 'hash', 'attachment_hash');
       
    }
    
    public function comments()
    {

        return $this->hasMany('App\Models\Comments', 'ads_id', 'id');


    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id');
    }

    public function type(){
        return $this->belongsTo('App\Models\AdType', 'type_id');
    }
    
    public function tags()
    {
        return $this->belongsTo('App\Models\Tags');
    }

    public function isApproved()
    {
        return (bool)$this->approved;
    }

    public function scopeApproved($query)
    {
        return $query->where('approved', 1);
    }

}
