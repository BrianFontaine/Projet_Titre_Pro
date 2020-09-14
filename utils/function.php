<?php

function getExtension($filename){ // $filename = "monimage.jpg"
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    return strtolower($extension);
}

function redim($pictureDest){
    list($src_w, $src_h) = getimagesize($pictureDest);
    $dst_image = imagecreatetruecolor(500, 500);
    $extension = getExtension($pictureDest);
    $dest_w = 500;
    $dest_h = 500;
    switch ($extension) {
        case 'jpg':
            $src_image = imagecreatefromjpeg($pictureDest);
            $result = imagecopyresampled($dst_image, $src_image,0 ,0 , 0, 0 ,$dest_w ,$dest_h, $src_w, $src_h);
            imagejpeg($dst_image, $pictureDest, 70);
            break;
        case 'jpeg':
            $src_image = imagecreatefromjpeg($pictureDest);
            $result = imagecopyresampled($dst_image, $src_image,0 ,0 , 0, 0 ,$dest_w ,$dest_h, $src_w, $src_h);
            imagejpeg($dst_image, $pictureDest, 70);
            break;
        case 'png':
            $src_image = imagecreatefrompng($pictureDest);
            $result = imagecopyresampled($dst_image, $src_image,0 ,0 , 0, 0 ,$dest_w ,$dest_h, $src_w, $src_h);
            imagepng($dst_image, $pictureDest, 8);
            break;
        case 'gif':
            $src_image = imagecreatefromgif($pictureDest);
            $result = imagecopyresampled($dst_image, $src_image,0 ,0 , 0, 0 ,$dest_w ,$dest_h, $src_w, $src_h);
            imagegif($dst_image, $pictureDest);
            break;
        default:
            return false;
            break;
    }

    return $result;
}