<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail ;


use App\message_deliver;
use App\email_config;

class mailcontroller extends Controller
{
    
	public function send(){
		
		Mail::send(['name'=>'emmanuel'] , ['name' , 'emmanuel'] , function($message){
			
			 $message->to('danielolafimihan12@gmail.com' , 'Daniel')->subject('subject of the message');
			$message->from('support@amazglobal.com.ng' ,  'amazglobal.com.ng');
			
		} );
		
	}
	
	
	
	
	
	public function mail_config(request $request ){
		if(session('admin')){  
		
		$contact_details  = email_config::first();
		
			
$host =($request->host !="")?$request->host:' ';
$port =($request->port !="")?$request->port:' ';
$email =($request->email !="")?$request->email:' ';
$password =($request->password !="")?$request->password:' ';

	$contact_details->host  = $host ;
	$contact_details->port  = $port ;
		$contact_details->email  = $email ;
		$contact_details->password  = $password ;
			
			
			
$contact_details->save()  ;
			
			
		}
		return   back();
	}
	
	
	
	
	
	public function save_messages(request $request ){
		if(session('admin')){  
			
$contact_details  = message_deliver::first();
			
$created_order =($request->created_order !="")?$request->created_order:' ';
$complete_order =($request->complete_order !="")?$request->complete_order:' ';
$cancel_order  =($request->cancel_order !="")?$request->cancel_order:' ';
			
$contact_details->created_order  = $contact_details;
			
$contact_details->complete_order  = $complete_order;
			
$contact_details->cancel_order  = $cancel_order;
			

$contact_details->save()  ;
			
		}
		return   back();
	}
	
	
	
	
	
	
	
}
