<?php

use TechStore\Classes\Cart;

require_once "../app.php";

if($request->postHas('submit'))
{
   $id = $request->post('id');
   $name = $request->post('name');
   $price = $request->post('price');
   $img = $request->post('img');
   $qty = $request->post('qty');

   $prodData=
   [
       'qty'=>$qty,
       'name'=>$name,
       'price'=>$price,
       'img'=>$img,

   ] ;

   $cart = new Cart;
   $cart->add($id , $prodData);

  $totalPrice = $cart->total();

$request->redirect("index.php");
}
