<?php
/**
 * Created by PhpStorm.
 * User: Aleksey I.
 * Date: 24.02.15
 * Time: 20:35
 */
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banners';

    protected $fillable = [
        'text',
        'link',
        'attachment_id',
        'paid_up',
        'city_id'

    ];

    public function attachment()
    {
        return $this->belongsTo('App\Models\Attachment', 'attachment_id', 'id');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\Cities', 'city_id', 'id');
    }


}