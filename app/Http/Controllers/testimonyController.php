<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\testimony;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;




class testimonyController extends Controller
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
        // main display  
            
        $service = testimony::orderby('created_at'  , 'desc')->paginate(100);
        $all = ['service'=> $service   ,  'title' =>  'Testimony' ];
        return view('admin_folder/testimonies')->with($all);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin_folder/add_testimony')->with('title',  'Testimony');
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



        $service  = new testimony();
        $service->title  = $request->title;
        $service->body  = $request->body;
        
        $service->publish  = (isset($request->publish)) ?  $request->publish  :  'no';

        if ($request->image  != '') {

            $image = $request->file('picture');
            $getsize =  $image->getSize();
            $original_name = $image->getClientOriginalName();
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $real_path  =   $image->getRealPath();
            $image->move(public_path('picture_servic'), $new_name);
            $service->image  =    '/picture_servic/' . $new_name;

        } else {

            $service->image  =    '  ';
        }


        $service->save();
        //insert image here if available


        //do not publish if public is not selected.....  
      
        //update  the  api  key

        return  redirect('/testimony');
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
        $service =  testimony::find($id);
        $all = array('edit' => 'edit', 'id' => $id ,  'type'=>'testimony'   , 'service'=>$service);

        return view('admin_folder/add_testimony')->with($all);
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

        $service  = testimony::find($id);
        $service->title  = $request->title;
        $service->body  = $request->body;
        $service->publish  = (isset($request->publish)) ?  $request->publish  :  'no';

        if ($request->image  != '') {

            $image = $request->file('picture');
            $getsize =  $image->getSize();
            $original_name = $image->getClientOriginalName();
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $real_path  =   $image->getRealPath();
            $image->move(public_path('picture_servic'), $new_name);

            $service->image  =    '/picture_servic/' . $new_name;
        } else {
        }


        $service->save();

   
    
        return  redirect('/testimony');
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
        $service  = testimony::find($id);
        $service->delete();

        return   redirect('/testimony');
    }
}
