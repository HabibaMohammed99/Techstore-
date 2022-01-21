<?php
namespace TechStore\Classes\Validation;

class Validator{
    private $errors= [];

    public function validate(string $name , $value ,array $rules)
    {
        foreach ($rules as $rule) :
                $newRule = "TechStore\\Classes\\Validation\\". $rule;
                $obj = new $newRule;

            $error = $obj->check($name,$value);
            if($error !== false):
                $this->errors[]=$error;
                break;
            endif;
        endforeach;
    }

    public function getError():array
    {
        return $this->errors;
    }

    public function hasErrors():bool
    {
        return (! empty($this->errors));
        
    }


}