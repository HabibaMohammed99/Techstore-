<?php
namespace TechStore\Classes\Validation;

class Max implements ValidationRule{

    public function check(string $name, $value)
    {
        if(strlen($value)>255)
        {
            return "$name must be equal or less than 255";
        }
        return false;
    }
}