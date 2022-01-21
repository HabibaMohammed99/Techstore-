<?php
namespace TechStore\Classes\Models;
use TechStore\Classes\Db;

class Product extends Db{

    public function __construct()
    {
        $this->connect();
        $this->table = "products";
    }

    public function getOne($id,string $filds="products.*")
    {
        $query = "SELECT $filds FROM $this->table join cats
         ON $this->table.cat_id = cats.id
         where $this->table.id=$id";
      $result =  mysqli_query($this->conn , $query);
     return mysqli_fetch_assoc($result);

    }

    public function getAllWithCats(string $filds="*") :array
    {
        $query = "SELECT $filds FROM $this->table join cats
        ON $this->table.cat_id = cats.id ORDER BY $this->table.id DESC";
      $result =  mysqli_query($this->conn , $query);
     return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

}