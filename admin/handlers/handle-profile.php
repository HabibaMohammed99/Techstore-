<?php


require_once "../../app.php";
use TechStore\Classes\Models\Admin;
use TechStore\Classes\Validation\Validator;



if($request->postHas('submit'))
{
   $name = $request->post('name');
   $email = $request->post('email');
   $password = $request->post('password');
   $confirm_password = $request->post('confirm_password');
   
   //validation
   $validator = new Validator;
   
       $validator->validate("name",$name,['required','str','max']);
       $validator->validate("email",$email,['required','email','max']);

       if(! empty($password) and $password == $confirm_password)
        {
            $validator->validate("password",$password,['required','str','max']);
        }
  

   if($validator->hasErrors())
   {
       $session->set("errors",$validator->getError());
       $request->aredirect("profile.php");
   }else{
      
          $admin = new Admin;

          //with password
          $admin->update("name='$name , email='$email' ,`password`='$password'",$session->get("adminId"));

          //without password
          $admin->update("name='$name , email='$email'",$session->get("adminId"));

          $session->set("success","profile edited successfuly");
          $request->aredirect("handlers/handle-logout.php");
        
        }

}else{
    $request->aredirect("login.php");
}