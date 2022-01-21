<?php


use TechStore\Classes\Models\Admin;
use TechStore\Classes\Validation\Validator;

require_once "../../app.php";


if($request->postHas('submit'))
{
   $email = $request->post('email');
   $password = $request->post('password');
   
   //validation
   $validator = new Validator;
   
       $validator->validate("email",$email,['required','email','max']);

       $validator->validate("password",$password,['required','str','max']);
  

   if($validator->hasErrors())
   {
       $session->set("errors",$validator->getError());
       $request->aredirect("login.php");
   }else{
      
          $admin = new Admin;
          $islogin = $admin->login($email , $password ,$session);
          if($islogin)
          {
            $request->aredirect("index.php");
          }
          else{
              $session->set("errors",["credintals  are not correct"]);
              $request->aredirect("login.php");
          }
        }

}else{
    $request->aredirect("login.php");
}