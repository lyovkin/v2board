<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryAttachment extends File implements UploadInterface {

    protected $fillable = ['comment', 'link'];

}
