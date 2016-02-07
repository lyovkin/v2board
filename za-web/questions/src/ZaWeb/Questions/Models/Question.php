<?php namespace ZaWeb\Questions\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    
    protected $table = 'questions';
    
    protected $fillable = ['title', 'text', 'city_id'];
    
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function questions_attachment()
    {
        return $this->belongsTo('ZaWeb\Questions\Models\QuestionAttachment', 'attachment_hash', 'hash');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Answer', 'question_id', 'id');

    }
    public function city()
    {
        return $this->belongsTo('App\Models\Cities', 'city_id', 'id');
    }
}
