<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\client;
use App\add_category;
use App\add_product;
use App\vendor_list;
use App\order_list;
use App\account_detail;

class vendorController extends Controller
{
    //
	
		
	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
	

  switch ($theType) {
		  
	  case "image":
	$theValue = ($theValue != "") ? "'" .$theValue . "'" : "NULL";
      break;
		  
    case "text":
       $theValue = ($theValue != "") ?  htmlentities($theValue)  : "NULL";
      break;
	     
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
		
	
	
	
	
	public  function  index(){
		
		return  view('vendor');
	}
	
			
	public  function  checkpassword(request  $request){
		//set the password 
		if(session('vendor')){
		//check 	
			
			$vendor_list= vendor_list::where('password', $request->password)->first();
			
			
			if(count($vendor_list)  ==  1) { 
				
			// set the password 
				$request->session()->put('password_confirm'  ,  $request->password );
				

				
				return  view('vendor.vendor_account')->with('response'   , 'Password Confirmed');
			
			} else{
			
				return view('vendor.vendor_account')->with('response'   , 'Password Not Correct');
			}
			
			
		}
		
		return back();
		
	}
	
		
	public  function  update_account(request $request){
		
		
		if(session('vendor'))  {
			
			if(session('password_confirm')){
				
				//update  and remove session;
				
		$account_detail  = account_detail::where('vendor' , session('vendor'))->first();
				
		$account_name =   vendorController::GetSQLValueString($request->account_name ,'text');
			
		$bank_name =	  vendorController::GetSQLValueString($request->bank_name ,'text');
			
			
		$account_number = 	vendorController::GetSQLValueString($request->account_number ,'text');
			
		$account_detail->account_name = $account_number;  
		$account_detail->bank_name = $bank_name;
			
		$account_detail->account_number = $account_number;  
				
		$account_detail->vendor = session('vendor');  
			
			
		$account_detail->save();
			
			//remove the session
		 $request->session()->forget('password_confirm');
				
				
				?>
	<script>
				
				setTimeout(function(){  alertcon('Updated' , 3000);   $('.password_provide').fadeOut()  } , 1000) 
</script>
				<?php
				
				
				return view('vendor.vendor_account');
				
			}else{
			?>
			
<script>
				
				setTimeout(function(){  alertcon('Provide Password Before Update' , 3000);   $('.password_provide').fadeIn()  } , 1000) 
</script>
			
			<?php
				
				return  view('vendor.vendor_account');
			}
			
			
			
			
		}
		
		return  back();
		
		
		
		
	}
	
	
		
	public  function  account_detail(request $request){
		
	
		if(session('vendor')){  
		
			
			// check if it exist or not   okay  
			
			
			
			//insert into database  
			$account_detail =  new account_detail();
			
			$account_name =   vendorController::GetSQLValueString($request->account_name ,'text');
			
		$bank_name =	  vendorController::GetSQLValueString($request->bank_name ,'text');
			
			
		$account_number = 	vendorController::GetSQLValueString($request->account_number ,'text');
			
		$account_detail->account_name = $account_number;  
		$account_detail->bank_name = $bank_name;
			
		$account_detail->account_number = $account_number;  
				
		$account_detail->vendor = session('vendor');  
			
			
		$account_detail->save();
			
				
				
			
			
			
		}
		
		
		return  back();
		
		
	}
	
	
	
	
	
	
	public  function  vendor_signin(request  $request){
		
		if(session('admin')){  
			
		$request->session()->forget('admin');
			
		}
		
		
		return  view('vendor.vendor_signin');
		
	}
	
	
		public  function vendor_signin_redirect(request $request){
			
		  $checking = 	vendor_list::where('email'  , $request->username )->where('password' ,   $request->password)->first();
			
			if(count($checking )   == 1){
				$request->session()->put('vendor'  ,  $request->username );
				
				return redirect('/vendors');
			}else{
				
				$error ='wrong password or email address';
				
				return redirect('/vendor_signin')->with('error'  , $error);
				
			}
		
		
		
	}
	
	
	
	public  function  vendor_logout(request $request ){
		
			
	$request->session()->forget('vendor');
		
		return  redirect('/');
		
	}
	
	
}
