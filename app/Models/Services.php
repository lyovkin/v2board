<?php
/**
 * Created by PhpStorm.
 * User: anatoliy
 * Date: 24.07.15
 * Time: 12:12
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model {

    protected $table = 'services';

    protected $fillable = array('text', 'link', 'attachment_id', 'time', 'city_id');

    public function attachment()
    {
        return $this->belongsTo('App\Models\Attachment', 'attachment_id', 'id');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\Cities', 'city_id', 'id');
    }

}