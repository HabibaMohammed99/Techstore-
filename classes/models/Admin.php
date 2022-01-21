<?php
namespace TechStore\Classes\Models;
use TechStore\Classes\Db;
use TechStore\Classes\Session;

class Admin extends Db{

    public function __construct()
    {
        $this->connect();
        $this->table = "admins";
    }

    public function login(string $email , string $password , Session $session)
    {
        $query = "SELECT * FROM admins WHERE email='$email'";
        $result = mysqli_query($this->conn,$query);
        $admin = mysqli_fetch_assoc($result);
        if(! empty($admin))
        {
            $hashedPassword = $admin['password'];
            $isVerify = password_verify($password , $hashedPassword);
            
            if($isVerify)
            {
                $session->set("adminId",$admin['id']); 
                $session->set("adminEmail",$admin['email']); 
                $session->set("adminName",$admin['name']); 

                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }


    }

    public function logout(Session $session)
    {
        $session->remove("adminId");
        $session->remove("adminEmail");
        $session->remove("adminName");
        
    }


}