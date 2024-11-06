<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\admins;

class users extends Controller
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
		
		return  view('admin_folder/users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		
		return  view('admin_folder/add_user');
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
		
		$service  = new admins();
		
		$service->username  =$request->username;
		
		$service->password =  $request->password  ;
		
		$service->save();
		
		return  redirect('/users');
		
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
		
			$all = array('edit'=> 'edit'  , 'id'=> $id);
		
			return view('admin_folder/add_user')->with($all);
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
		
			
		$service  =  admins::find($id);
		
		$service->username  =$request->username;
		
		$service->password =  $request->password  ;
		
		$service->save();
		
		return  redirect('/users');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //do nor allow delete of owner  
        $service  = admins::find($id);
         if(session('admin')  !=  $service->username  ){
            $service->delete();

         }
		
	
		
		return   redirect('/users');
		
    }
}
