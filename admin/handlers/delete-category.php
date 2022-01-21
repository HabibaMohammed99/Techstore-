<?php
require_once "../../app.php";

use TechStore\Classes\Models\Cat;

if($request->getHas('id'))
{
    $id = $request->get('id');

    $cat = new Cat;
    $cat->delete($id);

    $session->set("success","category deleted successfuly");
    $request->aredirect("categories.php");
}