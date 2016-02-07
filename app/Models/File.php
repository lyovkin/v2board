<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class File extends Model
{
    /**
     * @return string
     */
    public function getUploadPath()
    {
        return $this->uploadPath;
    }
 
    /**
     * @param string $uploadPath
     */
    public function setUploadPath($uploadPath)
    {
        $this->uploadPath = $uploadPath;
    }
 
    public function getSrc()
    {
        if($this->name){
            $src = $this->getUploadPath() . $this->name;
        }else{
            $src = 'http://placehold.it/415x150';
        }
 
        return $src;
    }
 
    public function removeAttachment()
    {
        unlink(public_path(). $this->getUploadPath().$this->name);
        return $this;
 
    }
    
}
