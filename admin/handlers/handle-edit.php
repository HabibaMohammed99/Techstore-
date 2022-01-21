<?php

use TechStore\Classes\File;
use TechStore\Classes\Models\Product;
use TechStore\Classes\Validation\Validator;

require_once "../../app.php";  

if($request->postHas('submit'))
{
    $id = $request->post('edit_id');
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
    if($img['error'] ==0){
        $validator->validate('image',$img,['image']);
    }

    if($validator->hasErrors())
    {
        $session->set("errors",$validator->getError());
        $request->aredirect("edit-product.php?edit_id=$id");
    }else{
        //upload file
        $pr = new Product;
        $imgName = $pr->getOne($id,'img')['img'];

        if($img['error']==0){
            unlink(PATH."uploads/".$imgName);
            $file = new File($img);
            $imgName = $file->rename()->upload();
        }

       //insert
       $pr->update("name='$name',`desc`='$desc',price='$price',pieces_no='$pieces_no',cat_id='$cat_id',img='$imgName'",$id);
        $session->set("success","product updated successfuly");
        $request->aredirect("products.php");
    }

}else{
    $request->aredirect("edit-product.php?edit_id=$id");
}