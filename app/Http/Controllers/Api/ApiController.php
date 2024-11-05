<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\page;
use App\servicess;
use App\testimony;
use Illuminate\Http\Request;

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


}
