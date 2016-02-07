<?php

namespace App\Models;


class Attachment extends File implements UploadInterface
{
    
    protected $table = 'attachment';

    protected $uploadPath = '/uploads/attachments/';

    protected $fillable = [];


}
