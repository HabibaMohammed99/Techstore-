<?php

use TechStore\Classes\Models\Cat;
use TechStore\Classes\Validation\Validator;

require_once "../../app.php";  

if($request->postHas('submit'))
{
    $id = $request->post('id');
    $name = $request->post('name');




    $validator = new Validator;
    $validator->validate('name',$name,['required','str','max']);

    if($validator->hasErrors())
    {
        $session->set("errors",$validator->getError());
        $request->aredirect("edit-category.php?id=$id");
    }else{
        $cat = new Cat;
    
       //insert
       $cat->update("name='$name'",$id);
        $session->set("success","category updated successfuly");
        $request->aredirect("categories.php");
    }

}else{
    $request->aredirect("edit-category.php?id=$id");
}