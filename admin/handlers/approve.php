<?php
use TechStore\Classes\Models\Order;
require_once "../../app.php";

if($request->getHas('id'))
{
 $id = $request->get('id');
    $or = new Order;
    $or->update("status='approved'",$id);

    $session->set("success","product approved");
    $request->aredirect("order.php?id=$id");
}
