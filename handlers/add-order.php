<?php


use TechStore\Classes\Cart;
use TechStore\Classes\Models\Order;
use TechStore\Classes\Models\OrderDetail;
use TechStore\Classes\Validation\Validator;


require_once "../app.php";

$order = new Order;
$cart = new Cart;
$orderDetail = new OrderDetail;

if($request->postHas('submit') and $cart->count()>0)
{
   $name = $request->post('name');
   $email = $request->post('email');
   $phone = $request->post('phone');
   $address = $request->post('address');
   
   //validation
   $validator = new Validator;
   $validator->validate("name",$name,['required','str','max']);
   if(! empty($email)){
       $validator->validate("email",$email,['str','max']);
       $email = " '$email' ";
   }else{
       $email = "null" ;
   }
   $validator->validate("phone",$phone,['required','str','max']);
   if(! empty($address)){
       $validator->validate("address",$address,['str','max']);
       $address = " '$address' ";
   }else{
       $address = "null";
   }

   if($validator->hasErrors())
   {
       $session->set("errors",$validator->getError());
       $request->redirect("cart.php");
   }else{

     $orderId=  $order->insertAndGetId("name, email, phone, address", " '$name', $email ,'$phone', $address ");
     foreach($cart->all() as $prodId => $prodData)
     {
         $qty = $prodData['qty'];
         $orderDetail->insert("`order_id`, `product_id`, `qty`", " '$orderId', '$prodId', '$qty' ");
     }
     $cart->empty();
     $request->redirect("products.php");
    }

}else{
    $request->redirect("products.php");
}
