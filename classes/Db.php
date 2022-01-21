<?php
namespace TechStore\Classes;

abstract class Db{
    protected $conn;
    protected $table;

    public function connect()
    {
    $this->conn =  mysqli_connect(DB_SERVERNAME,DB_USERNAME,DB_PASSWORD,DB_NAME);
    }

    public function getAll(string $filds="*") :array
    {
        $query = "SELECT $filds FROM $this->table";
      $result =  mysqli_query($this->conn , $query);
     return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    public function getOne($id,string $filds="*")
    {
        $query = "SELECT $filds FROM $this->table where id=$id";
      $result =  mysqli_query($this->conn , $query);
     return mysqli_fetch_assoc($result);

    }

    public function getWhere($conds ,string $filds="*") :array
    {
        $query = "SELECT $filds FROM $this->table where $conds";
      $result =  mysqli_query($this->conn , $query);
     return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    public function getCount()
    {
        $query = "SELECT count(*) AS count FROM $this->table ";
      $result =  mysqli_query($this->conn , $query);
     return mysqli_fetch_assoc($result)['count'];

    }

    public function insert(string $fields , string $values) :bool
    {
        $query ="INSERT INTO $this->table ($fields) values($values)";
       return mysqli_query($this->conn , $query);
    }

    public function insertAndGetId(string $fields , string $values) 
    {
        $query ="INSERT INTO $this->table ($fields) values($values)";
        mysqli_query($this->conn , $query);
        return mysqli_insert_id($this->conn);
    }

    public function update(string $set , $id) : bool
    {
        $query = "UPDATE $this->table set $set where id=$id";
       return mysqli_query($this->conn , $query);
    }

    public function delete( $id) : bool
    {
        $query = "DELETE FROM $this->table  where id=$id";
       return mysqli_query($this->conn , $query);
    }

}