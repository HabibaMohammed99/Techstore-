<?php
namespace TechStore\Classes\Models;
use TechStore\Classes\Db;

class OrderDetail extends Db{

    public function __construct()
    {
        $this->connect();
        $this->table = "order_details";
    }

    public function selectWithProducts($order_id)
    {
        $query ="SELECT qty,name,price FROM $this->table join products
        on order_details.product_id = products.id
        where  $this->table.order_id = $order_id";
        $result = mysqli_query($this->conn,$query);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

}