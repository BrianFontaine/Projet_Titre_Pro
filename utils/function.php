<?php

function getExtension($filename){ // $filename = "monimage.jpg"
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    return strtolower($extension);
}

function redim($pictureDest,$wight,$height){
    list($src_w, $src_h) = getimagesize($pictureDest);
    $dst_image = imagecreatetruecolor($wight,$height);
    $extension = getExtension($pictureDest);
    switch ($extension) {
        case 'jpg':
            $src_image = imagecreatefromjpeg($pictureDest);
            $result = imagecopyresampled($dst_image, $src_image,0 ,0 ,0, 0 ,$wight ,$height, $src_w, $src_h);
            imagejpeg($dst_image, $pictureDest,90);
            break;
        case 'jpeg':
            $src_image = imagecreatefromjpeg($pictureDest);
            $result = imagecopyresampled($dst_image, $src_image,0 ,0 ,0, 0 ,$wight ,$height, $src_w, $src_h);
            imagejpeg($dst_image, $pictureDest,90);
            break;
        case 'png':
            $src_image = imagecreatefrompng($pictureDest);
            $result = imagecopyresampled($dst_image, $src_image,0 ,0 ,0, 0 ,$wight ,$height, $src_w, $src_h);
            imagepng($dst_image, $pictureDest,9);
            break;
        case 'gif':
            $src_image = imagecreatefromgif($pictureDest);
            $result = imagecopyresampled($dst_image, $src_image,0 ,0 , 0, 0 ,$wight ,$height, $src_w, $src_h);
            imagegif($dst_image, $pictureDest);
            break;
        default:
            return false;
            break;
    }
    return $result;
}
