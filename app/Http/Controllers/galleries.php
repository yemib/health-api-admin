<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\gallery;
 
class galleries extends Controller
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
		
		return view('admin_folder/gallery');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		
		return view('admin_folder/add_gallery');
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
			
		$service  = new gallery();
		
		$service->publish  =(isset($request->publish) ) ?  $request->publish  :  'no' ;
		$service->text1  =($request->text1 != '' ) ?  $request->text1 :  ' ' ;
		
		
		if($request->image  != ''){  
			
			$image = $request->file('picture');
			$getsize =  $image->getSize();
	$original_name =$image->getClientOriginalName();
	$new_name = rand() . '.' . $image->getClientOriginalExtension();
	$real_path  =   $image->getRealPath();
	$image->move(public_path('pictures'), $new_name);
			
			$service->image  =	'/pictures/'.$new_name;
		
		}else{
			
		$service->image  =	'  ' ;
		}
		
		
		
		$service->save();
		
		return  redirect('/gallery');
		
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
		
			return view('admin_folder/add_gallery')->with($all);
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
		
		$service  = gallery::find($id);
		
		
		$service->publish  =(isset($request->publish) ) ?  $request->publish  :  'no' ;
		
		$service->text1  =($request->text1 != '' ) ?  $request->text1 :  ' ' ;
		
		
			
	
		if($request->image  != ''){  
			
			$image = $request->file('picture');
			$getsize =  $image->getSize();
	$original_name =$image->getClientOriginalName();
	$new_name = rand() . '.' . $image->getClientOriginalExtension();
	$real_path  =   $image->getRealPath();
	$image->move(public_path('pictures'), $new_name);
			
			$service->image  =	'/pictures/'.$new_name;
		
		}else{
			
	
		}
		
		
		
		
	
		
		
		
		
		$service->save();
		
		
		return  redirect('/gallery');
		
		
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
		
		
		$service  = gallery::find($id);
		$service->delete();
		
		return   redirect('/gallery');
		
    }
}
