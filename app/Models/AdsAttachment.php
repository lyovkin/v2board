<?php namespace App\Models;


class AdsAttachment extends File implements UploadInterface
{

    protected $table = 'ads_attachment';

    protected $uploadPath = '/uploads/ads_attachments/';

    protected $fillable = [];

}
