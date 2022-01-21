<?php

use TechStore\Classes\Cart;

require_once "../app.php";

if($request->getHas('id'))
{
    $id = $request->get('id');
    
    $cart = new Cart;
    $cart->remove($id);
    $request->redirect("cart.php");
}