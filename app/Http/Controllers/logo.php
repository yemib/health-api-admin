<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\logos;
 
class logo extends Controller
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
		
		return view('admin_folder/logo');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		
		return view('admin_folder/logo');
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
			
		$service  = new logos();
		
	
		
		$service->image  =   ($request->image  != '')? $request->image : '  ' ;
		
		$service->save();
		
		return  redirect('/logo');
		
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
		
			return view('admin_folder/logo')->with($all);
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
		
		$service  = logos::find($id);
		
	
		
				if($request->image  != ''){  
			
			$image = $request->file('picture');
			$getsize =  $image->getSize();
	$original_name =$image->getClientOriginalName();
	$new_name = rand() . '.' . $image->getClientOriginalExtension();
	$real_path  =   $image->getRealPath();
	$image->move(public_path('picture_logo'), $new_name);
			
			$service->image  =	'/picture_logo/'.$new_name;
		
		}else{
			

		}
		
		
		
		
		
		
		
		
		
		
		$service->save();
		
		
	return  redirect('/logo');
		
		
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
		
		
		$service  = logos::find($id);
		$service->delete();
		
		return   redirect('/logo');
		
    }
}
