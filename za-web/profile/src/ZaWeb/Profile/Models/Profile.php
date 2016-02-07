<?php

namespace ZaWeb\Profile\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';
    
    protected $fillable = ['name', 'last_name', 'phone', 'city_id', 'about', 'attachment_id'];

    protected $guarded = ['_token'];

    public $timestamps = false;
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function city()
    {
        return $this->belongsTo('App\Models\Cities');
    }
    public function advertisements()
    {
        return $this->hasMany('App\Models\Advertisement', 'user_id', 'id');
    }

    public function transaction()
    {
        return $this->belongsTo('App\Models\Payment');
    }

    public  function questions()
    {   
        return $this->hasMany('ZaWeb\Questions\Models\Question'); 
    }

    public function avatar()
    {
        return $this->belongsTo('ZaWeb\Profile\Models\ProfileAttachment', 'attachment_id', 'id');
    }
}
