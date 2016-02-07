<?php namespace ZaWeb\Questions\Models;

use App\Models\File as File;
use App\Models\UploadInterface;
class QuestionAttachment extends File implements UploadInterface {

    protected $table = 'question_attachment';

    protected $uploadPath = '/uploads/questions/';

    protected $fillable = [];

}
