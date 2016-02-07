<?php

namespace App\Services\Image;


use App\Models\Attachment;
use App\Models\UploadInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Illuminate\Support\Facades\Session;

/**
 * Class Image
 * @package App\Services\ImageUploadService
 */
class ImageUploadService
{
    public function __construct()
    {
        $this->path = base_path().'/storage/app/uploads/';
    }
    
    public function image(UploadedFile $file = null, Attachment $attachment = null)
    {
        if($file == null){
            return;
        }
        if($attachment == null){
            $attachment = new Attachment();
        }


       // dd($file->getClientOriginalExtension());
        $name = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path() .
            $this->path.'attachments/',$name);

        $attachment->name = $name;
        $attachment->path = $attachment->getUploadPath() .
            $name;

        //$attachment->user_id = Auth::user()->id;
        $attachment->save();

        return $attachment;

    }
    public function attachmentUpload(UploadedFile $file = null, UploadInterface $model, $folder, $hash = false)
    {
        if($file == null)
        {
            return null;
        }
        $path = $this->path.$folder.'/';
        $name = md5(uniqid(rand(),1)).'.'.$file->getClientOriginalExtension();
        $file->move($path, $name);
        $model->name = $name;
        $model->path = $path.$name;
        $model->url =  url('img', [$folder, $name]);
        if($hash)
        {
            $model->hash = Session::get($folder.'_hash');
        }
        $model->save();
        return $model;
       
    }

    public function upload(UploadedFile $file, $folder){
        $path = $this->path.$folder.'/';
        $name = md5(uniqid(rand(),1)).'.'.$file->getClientOriginalExtension();
        $file->move($path, $name);
        return url('img', [$folder, $name]);
    }
}
