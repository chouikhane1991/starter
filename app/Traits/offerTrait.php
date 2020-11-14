<?php
namespace App\Traits;



trait offerTrait{

     function SaveImage($fileExtantion,$photpath){
        $photofile=$fileExtantion->getclientoriginalextension();//get just the extantion
        $image_name=time().'.'.$photofile;
        $path=$photpath;
        $fileExtantion->move($path,$image_name);
        return $image_name;


    }



}
