<?php
namespace TechStore\Classes\Models;
use TechStore\Classes\Db;

class Order extends Db{

    public function __construct()
    {
        $this->connect();
        $this->table = "orders";
    }

    public function getAll(string $filds="*") :array
    {
        $query = "SELECT $filds FROM $this->table JOIN order_details JOIN products
        ON $this->table.id = order_details.order_id
        AND order_details.product_id= products.id
        GROUP BY $this->table.id";
      $result =  mysqli_query($this->conn , $query);
     return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    public function getOne($id,string $filds="*")
    {
        $query = "SELECT $filds FROM $this->table join order_details join products
        on $this->table.id=order_details.order_id and order_details.product_id = products.id
         where $this->table.id=$id";
      $result =  mysqli_query($this->conn , $query);
     return mysqli_fetch_assoc($result);

    }

}