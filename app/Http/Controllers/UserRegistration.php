<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRegistration extends Controller
{
    public function  postRegister(Request $request){
     
        $name =    $request->input('name');
                 //Retrieve the username input field
      $username = $request->username;

           //Retrieve the password input field
           $password = $request->password;

        return  view('register', ['name'=> $name , 'surname'=> $username  ,  'password'=>  $password ]);


    }

}
