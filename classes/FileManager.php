<?php
class FileManager
{
    public static function upload($first,$last,$image)
    {
        $file_name = $_FILES["image_url"]["name"];
        $arr = array("ko", "lay", "ik");
        $extension = substr($file_name, -4, 4);
        $random = rand(1, 10000);
        $new_file_name = "public/image/" . strtolower($first . $last) . $arr[rand(0, 2)] . $random . $extension;
        if (move_uploaded_file($image["tmp_name"], $new_file_name)) {
            return $new_file_name;
        }
        elseif(empty($file_name))
        {
            return 'public/image/default.png';
        }
        else
        {
            return false;
        }

    }
}