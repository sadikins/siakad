<?php 

 $koneksi = new mysqli("localhost","root","","trainit_siakad");

 // Automatically crop and rezise image to specific size
 function resize_and_crop($original_image_url, $thumb_image_url, $thumb_w, $thumb_h, $quality=75)
{
    // ACQUIRE THE ORIGINAL IMAGE: http://php.net/manual/en/function.imagecreatefromjpeg.php
    $original = imagecreatefromjpeg($original_image_url);
    if (!$original) return FALSE;

    // GET ORIGINAL IMAGE DIMENSIONS
    list($original_w, $original_h) = getimagesize($original_image_url);

    // RESIZE IMAGE AND PRESERVE PROPORTIONS
    $thumb_w_resize = $thumb_w;
    $thumb_h_resize = $thumb_h;
    if ($original_w > $original_h)
    {
        $thumb_h_ratio  = $thumb_h / $original_h;
        $thumb_w_resize = (int)round($original_w * $thumb_h_ratio);
    }
    else
    {
        $thumb_w_ratio  = $thumb_w / $original_w;
        $thumb_h_resize = (int)round($original_h * $thumb_w_ratio);
    }
    if ($thumb_w_resize < $thumb_w)
    {
        $thumb_h_ratio  = $thumb_w / $thumb_w_resize;
        $thumb_h_resize = (int)round($thumb_h * $thumb_h_ratio);
        $thumb_w_resize = $thumb_w;
    }

    // CREATE THE PROPORTIONAL IMAGE RESOURCE
    $thumb = imagecreatetruecolor($thumb_w_resize, $thumb_h_resize);
    if (!imagecopyresampled($thumb, $original, 0,0,0,0, $thumb_w_resize, $thumb_h_resize, $original_w, $original_h)) return FALSE;

    // ACTIVATE THIS TO STORE THE INTERMEDIATE IMAGE
    // imagejpeg($thumb, 'RAY_temp_' . $thumb_w_resize . 'x' . $thumb_h_resize . '.jpg', 100);

    // CREATE THE CENTERED CROPPED IMAGE TO THE SPECIFIED DIMENSIONS
    $final = imagecreatetruecolor($thumb_w, $thumb_h);

    $thumb_w_offset = 0;
    $thumb_h_offset = 0;
    if ($thumb_w < $thumb_w_resize)
    {
        $thumb_w_offset = (int)round(($thumb_w_resize - $thumb_w) / 2);
    }
    else
    {
        $thumb_h_offset = (int)round(($thumb_h_resize - $thumb_h) / 2);
    }

    if (!imagecopy($final, $thumb, 0,0, $thumb_w_offset, $thumb_h_offset, $thumb_w_resize, $thumb_h_resize)) return FALSE;

    // STORE THE FINAL IMAGE - WILL OVERWRITE $thumb_image_url
    if (!imagejpeg($final, $thumb_image_url, $quality)) return FALSE;
    return TRUE;
}

?>