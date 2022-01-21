<?php

use TechStore\Classes\Models\Cat;
use TechStore\Classes\Validation\Validator;

require_once "../../app.php";  

if($request->postHas('submit'))
{
    $name = $request->post('name');

    $validator = new Validator;
    $validator->validate('name',$name,['required','str','max']);

    if($validator->hasErrors())
    {
        $session->set("errors",$validator->getError());
        $request->aredirect('add-category.php');
    }else{
    
       //insert
       $cat = new Cat;
       $cat->insert("name","'$name'");

        $session->set("success","category  added successfuly");
        $request->aredirect("categories.php");
    }

}else{
    $request->aredirect("add-category.php");
}