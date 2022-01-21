<?php
require_once "app.php";

use TechStore\Classes\Cart;
use TechStore\Classes\Models\Admin;

//  $product->validate("name",'',['required','numeric']);
// $pro= $product->getError();
// echo "<pre>";
// print_r($product->getError());
// echo "</pre>";

// echo $request->getHas('name');

// $sess->set('name','habiab');
// print_r($request->get('name'));
// $sess->remove('name');
// var_dump($sess->has('name'));
// print_r($_SESSION);

// echo PATH;

// $cart = new Cart;
// echo $cart->total();


$admin = new Admin;
$check= $admin->logout($session);
var_dump($check);