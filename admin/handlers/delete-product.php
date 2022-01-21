<?php
require_once "../../app.php";
use TechStore\Classes\Models\Product;

if($request->getHas('delete_id'))
{
    $id = $request->get('delete_id');

    $pro = new Product;
    $image = $pro->getOne($id , "img")['img'];
    unlink(PATH."uploads/$image");
    $pro->delete($id);

    $session->set("success","product deleted successfuly");
    $request->aredirect("products.php");
}