<?php
namespace TechStore\Classes\Validation;

class Image implements ValidationRule{


    public function check(string $name, $value)
    {
        $allowExt = ['jpg','png','jpeg','gif'];
      $ext =  pathinfo($value['name'],PATHINFO_EXTENSION);
        if(! in_array($ext,$allowExt))
        {
            return "$name is not allowed , please upload jpg,jpeg,png,gif ";
        }
        return false;
    }
}