<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\page;
use App\contact_detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class pages extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
		 public function __construct()
    {

      
  
        $this->middleware('article');

       
    }
	
    public function index()
    {
        //
		
		return view('admin_folder/pages');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		
		return view('admin_folder/add_pages');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		
		$service  = new page();
		$service->title  = $request->title;
		$service->body  = $request->message;
		$service->publish  =(isset($request->publish) ) ?  $request->publish  :  'no' ;
		if($request->image  != ''){  
			$image = $request->file('picture');
			$getsize =  $image->getSize();
        $original_name =$image->getClientOriginalName();
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $real_path  =   $image->getRealPath();
        $image->move(public_path('picture_servic'), $new_name);
                
			$service->image  =	'/picture_servic/'.$new_name;
            //send the image here as well...
		
		}else{
			
		$service->image  =	'  ' ;
		}
		$service->save();

        
		//send the  message to the facebook page .

        
		return  redirect('/pages');
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		
		 //
		$all = array('edit'=> 'edit'  , 'id'=> $id);
		
			return view('admin_folder/add_pages')->with($all);
		
		
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
		
		
		$service  = page::find($id);
		
		$service->title  = $request->title;
		$service->body  = $request->message;
		$service->publish  =(isset($request->publish) ) ?  $request->publish  :  'no' ;
		
		
			
		if($request->image  != ''){  
			
			$image = $request->file('picture');
			$getsize =  $image->getSize();
	$original_name =$image->getClientOriginalName();
	$new_name = rand() . '.' . $image->getClientOriginalExtension();
	$real_path  =   $image->getRealPath();
	$image->move(public_path('picture_servic'), $new_name);
			
			$service->image  =	'/picture_servic/'.$new_name;
		
		}else{
			
		$service->image  =	'  ' ;
		}
		
		
		$service->save();
		
		
		return  redirect('/pages');
		
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		
				$service  = page::find($id);
		$service->delete();
		
		return   redirect('/pages');
    }
}
