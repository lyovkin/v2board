<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Collective\Annotations\Database\Eloquent\Annotations\Annotations\Bind;

/**
 * Class Gallery
 * @package App\Models
 * @Bind("gallery")
 */
class Gallery extends Model {

    protected $fillable = ['slug', 'title', 'article', 'description', 'tags', 'columns'];

    public function attachments(){
        return $this->hasMany('App\Models\GalleryAttachment', 'hash' ,'attachment_hash');
    }
}
