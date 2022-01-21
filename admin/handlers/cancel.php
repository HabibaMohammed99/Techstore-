<?php
use TechStore\Classes\Models\Order;
require_once "../../app.php";

if($request->getHas('id'))
{
 $id = $request->get('id');
    $or = new Order;
    $or->update("status='canceled'",$id);

    $session->set("success","product canceled");
    $request->aredirect("order.php?id=$id");
}
