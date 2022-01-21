<?php
namespace TechStore\Classes;

class File{
    private $name,$tmpName , $newName ;

    public function __construct($file)
    {
        $this->name = $file['name'];
        $this->tmpName = $file['tmp_name'];
    }

    public function rename()
    {
      $ext =  pathinfo($this->name , PATHINFO_EXTENSION);
      $this->newName = uniqid().".".$ext;

        return $this;
    }
    public function upload()
    {
        move_uploaded_file($this->tmpName,PATH."uploads/".$this->newName);
        return $this->newName;
    }
}