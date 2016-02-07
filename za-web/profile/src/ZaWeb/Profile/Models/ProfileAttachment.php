<?php

namespace ZaWeb\Profile\Models;
use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use App\Models\UploadInterface;
class ProfileAttachment extends File implements UploadInterface {

    protected $table = "profile_attachment";

    protected $fillable = [];
    
}
