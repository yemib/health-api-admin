<?php

namespace App\Http\Controllers\Api;

use App\contact_detail;
use App\gallery;
use App\Http\Controllers\Controller;
use App\logos;
use App\page;
use App\servicess;
use App\testimony;
use Illuminate\Http\Request;
use App\Mail\SendMessage;
use App\management;
use App\slidders;
use Illuminate\Support\Facades\Mail;

class ApiController extends Controller
{
    //
    private $pages_constant;

    public function __construct() {
         $this->pages_constant =   20;
    }

    public function blog($pages =  null){

        if($pages){

            $page_no  =  $pages ;
        }else{
            $page_no  =   $this->pages_constant;
            
        }
        try{ 
        $service = servicess::where('publish' ,  'yes')->orderby('created_at'  , 'desc')->paginate( $page_no);
    

        return response()->json( $service);

        }catch(\Exception   $e){
            return response()->json([ 'message'=>$e->getMessage()]);
        }
    }

    public function singleblog($slug){

        try{ 
        $service = servicess::where('slug' ,$slug )->first();
    
        if(isset($service->id)){
            return response()->json( $service);

        }    
        return response()->json([ 'message'=>"blog can't be found"]);
        

        }catch(\Exception   $e){
            return response()->json([ 'message'=>$e->getMessage()]);
        }
    }


    
    public function testimonies($pages =  null){

        if($pages){

            $page_no  =  $pages ;
        }else{
            $page_no  =    $this->pages_constant;
            
        }
        try{ 
        $service = testimony::where('publish' ,  'yes')->orderby('created_at'  , 'desc')->paginate( $page_no);
    

        return response()->json( $service);

        }catch(\Exception   $e){
            return response()->json([ 'message'=>$e->getMessage()]);
        }
    }

        
    public function managements($pages =  null){

        if($pages){

            $page_no  =  $pages ;
        }else{

            $page_no  =    $this->pages_constant;
            
        }
        try{ 
        $service = management::orderby('created_at'  , 'desc')->paginate( $page_no);
    
        return response()->json( $service);

        }catch(\Exception   $e){
            return response()->json([ 'message'=>$e->getMessage()]);
        }
    }
    public function gallery($pages =  null){

        if($pages){

            $page_no  =  $pages ;
        }else{

            $page_no  =    $this->pages_constant;
            
        }
        try{ 
        $service = gallery::orderby('created_at'  , 'desc')->paginate( $page_no);
    
        return response()->json( $service);

        }catch(\Exception   $e){
            return response()->json([ 'message'=>$e->getMessage()]);
        }
    }

    public function slides($pages =  null){

        if($pages){

            $page_no  =  $pages ;
        }else{

            $page_no  =    $this->pages_constant;
            
        }
        try{ 
        $service = slidders::orderby('created_at'  , 'desc')->paginate( $page_no);
    
        return response()->json( $service);

        }catch(\Exception   $e){
            return response()->json([ 'message'=>$e->getMessage()]);
        }
    }

    public function logo(){

      
        try{ 
        $service = logos::first();
    
        return response()->json( $service);

        }catch(\Exception   $e){
            return response()->json([ 'message'=>$e->getMessage()]);
        }
    }

    
    public function contact(){

      
        try{ 
        $service = contact_detail::first();
    
        return response()->json( $service);

        }catch(\Exception   $e){
            return response()->json([ 'message'=>$e->getMessage()]);
        }
    }



    

    public function allpages($pages =  null){

        if($pages){

            $page_no  =  $pages ;
        }else{
            $page_no  =    $this->pages_constant ;
            
        }
        try{ 
        $service = page::where('publish' ,  'yes')->orderby('created_at'  , 'desc')->paginate( $page_no);
    

        return response()->json( $service);

        }catch(\Exception   $e){
            return response()->json([ 'message'=>$e->getMessage()]);
        }
    }

    public function  page($id){

        try{ 
            $service = page::find($id);

            if(isset($service->id)){
                return response()->json( $service);
    
            }else{
                return response()->json([ 'message'=>"No page is found"]);

            }
        
           
            }catch(\Exception   $e){
                return response()->json([ 'message'=>$e->getMessage()]);
            }
    }


    public function sendmail(Request  $request){

        $data  =  [];
        if(isset($request->name)){
            $data['name'] =  $request->name  ;  
        }

        if(isset($request->phone)){
            $data['phone'] =  $request->phone ;  
        }

        if(isset($request->email)){
            $data['email'] =  $request->email ;  
        }

        if(isset($request->therapy)){
            $data['therapy'] =  $request->therapy ;  
        }
        if(isset($request->challenges)){
            $data['challenges'] =  $request->challenges ;  
        }       
        if(isset($request->experience)){
            $data['experience'] =  $request->experience ;  
        }

        if(isset($request->message)){
            $data['message'] =  $request->message ;  
        }

        if(isset($request->date1)){
            $data['date1'] =  $request->date1 ;  
        }
        if(isset($request->date2)){
            $data['date2'] =  $request->date2 ;  
        }
        


        $data['subject'] =  "Appointment";

        /* return new SendMessage($data)  ; */
        $contact  =  contact_detail::first();

        if($contact->email  !=  NULL  ){ 

                Mail::to($contact->email)->send(new SendMessage($data));

                return response()->json([ 'message'=>'successful']);

        }else{
            return response()->json([ 'message'=>'Please provide the contact email in admin']);

        }
    }

}
