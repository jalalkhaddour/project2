<?php

class Image{
    private $image;
    public $uploadImage;
    
    public function __construct($image) {
        $this->image = $image;
    }
    
    private function checkImage(){
        $images = $this->image;
        
        $imageName  = $images['name'];
        $imageTmp   = $images['tmp_name'];
        $imageSize  = $images['size'];
        $imageError = $images['error'];
        
        $imageExe = explode('.', $imageName);
        $imageExe = strtolower(end($imageExe));
        
        $newName = uniqid('post' , FALSE) . '.' . $imageExe;
        
        $allowed = ["bmp","jpeg","jpg","png","gif"];
        
        if(!in_array($imageExe, $allowed)){
            Messages::setMsg('خطأ', 'الرجاء اختيار صورة صحيحه', 'danger');
            echo Messages::getMsg();
        }else if($imageSize > 1024 * 1024){
            Messages::setMsg('خطأ', 'حجم الصورة كبير يجب ان يكون اقل من 1 ميجا بايت', 'danger');
            echo Messages::getMsg();
        }else if($imageError != 0){
            Messages::setMsg('خطأ', 'حدث خطأ اثناء رفع الصورة', 'danger');
            echo Messages::getMsg();
        }else{
            $dir = __DIR__.'/../libs/uplaod/';
            if(!file_exists($dir)){
                mkdir($dir , 0777 , TRUE);
            }
            $imageDire = $dir.$newName;
            if(move_uploaded_file($imageTmp, $imageDire)){
                $this->uploadImage = $newName;
                return TRUE;
            }else{
                Messages::setMsg('خطأ', 'حدث خطأ اثناء رفع الصورة', 'danger');
                echo Messages::getMsg();
            }
            return FALSE;
        }
    }
    
    public function Image(){
        if($this->checkImage())
            return TRUE;
        return false;
    }
}

