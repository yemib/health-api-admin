<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\order_list;
use App\cart_list;
use App\add_product;
use App\client;
use Paystack;


class PaymentController extends Controller
{
    //
	
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
	
	    public function redirectToGateway()
    {
		
		
        return Paystack::getAuthorizationUrl()->redirectNow();
		
		
    }
	
	
	 /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback(request $request)
    {
        
		$paymentDetails = Paystack::getPaymentData();

      // dd($paymentDetails);
		
		// here you confirm the payment period  okay .....
		
		if($paymentDetails['message']  == 'Verification successful'){
			
			if($request->reference ===  $paymentDetails['data']['reference']){
				
// check if the refrence already exist in the database ...// redirect to another path entirely 
//insert stuff  into database here 
// clear cart area and insert into order list  
				
//check if the ref exist in order_list database  
				
				
$order_check  = order_list::where('ref'  ,  $request->reference)->first();
				
				
				
				
				if(count($order_check)  ==  0 ){
					
					// check cart_list  
					
$cart_list  = cart_list::where('email'  ,  session('client'))->get();
// get the client information  
					
	$client  = client::where('email' , session('client'))->first();
					
					
					
	foreach($cart_list    as $cart_list_data){
						
	$order_list  =  new order_list();
						
						
	$order_list->email = session('client');
						
	$order_list->product_id  = $cart_list_data->product_id ;
						
				
$add_product_add  = add_product::where('id',$cart_list_data->product_id )->first();
		
$order_list->order_id  = $request->reference ;
$order_list->quantity  = $cart_list_data->quantity ;
						
$order_list->state  = 'progress';
$order_list->pay  = 'online';
$order_list->delivery_address  = $client->home_address   .  '    '  .  $client->country ;

// search the course for price  
$order_list->price  = $add_product_add->price ;
$order_list->delivery_amount  = 0;
$order_list->picture  =$add_product_add->picture;
		
$order_list->ref  = $request->reference ;
		
$order_list->save();					
						

					}
					
//cleat cartlist here 
	$cart_delete  = cart_list::where('email'  ,  session('client'));				
		$cart_delete->delete();	
					
		return	   redirect('/my order') ;
					
				}else{
					
			return redirect('/cart');
					
					
				}
			  	

				
			}else{
				
				return  redirect('/cart');
 				
			}
			
		
		}  
		 // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }
	
	
	
}
