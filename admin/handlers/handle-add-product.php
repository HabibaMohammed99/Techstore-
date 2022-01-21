<?php

use TechStore\Classes\File;
use TechStore\Classes\Models\Product;
use TechStore\Classes\Validation\Validator;

require_once "../../app.php";  

if($request->postHas('submit'))
{
    $name = $request->post('name');
    $cat_id = $request->post('cat_id');
    $price = $request->post('price');
    $pieces_no = $request->post('pieces_no');
    $desc = $request->post('desc');
    $img = $request->files('img');



    $validator = new Validator;
    $validator->validate('name',$name,['required','str','max']);
    $validator->validate('cat_id',$cat_id,['required','numeric']);
    $validator->validate('price',$price,['required','numeric']);
    $validator->validate('pieces number',$pieces_no,['required','numeric']);
    $validator->validate('description',$desc,['required','str']);
    $validator->validate('image',$img,['requiredfile','image']);

    if($validator->hasErrors())
    {
        $session->set("errors",$validator->getError());
        $request->aredirect('add-product.php');
    }else{
        //upload file
        $file = new File($img);
       $newName = $file->rename()->upload();

       //insert
       $pro = new Product;
       $pro->insert("name,`desc`,price,pieces_no,img,cat_id","'$name','$desc','$price','$pieces_no','$newName','$cat_id'");

        $session->set("success","product added successfuly");
        $request->aredirect("products.php");
    }

}else{
    $request->aredirect("add-product.php");
}