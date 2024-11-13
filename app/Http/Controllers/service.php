<?php

namespace App\Http\Controllers;

use App\contact_detail;
use Illuminate\Http\Request;
use App\servicess;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class service extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

        if (!Schema::hasColumn('servicesses',  'facebookid')) {
            //run a script perfectly here  okay 
            DB::statement('ALTER TABLE servicesses ADD COLUMN facebookid TEXT NULL');
        }


        $this->middleware('article');
    }

    public function index()
    {
        // main display  
        $service = servicess::orderby('created_at'  , 'desc')->paginate(100);
        $all = ['service'=> $service   ,  'title' =>  'Testimony' ];
        return view('admin_folder/services')->with($all);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  


    public function create()
    {
        //
        return view('admin_folder/add_services');
    }

    public function setSlugAttribute($value)
    {
        if (!empty($value)) {
            $temp_slug = Str::slug($value, '-');
            if (!servicess::all()->where('slug', $temp_slug)->isEmpty()) {
                $i = 1;
                $new_slug = $temp_slug . '-' . $i;
                while (!servicess::all()->where('slug', $new_slug)->isEmpty()) {
                    $i++;
                    $new_slug = $temp_slug . '-' . $i;
                }
                $temp_slug = $new_slug;
            }
            return  $temp_slug;
        }
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



        $service  = new servicess();
        $service->title  = $request->title;
        $service->body  = $request->body;
        $service->slug =  $this->setSlugAttribute($request->title) ;
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

        return  redirect('/newsletters');
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
        $service =  servicess::find($id);
        $all = array('edit' => 'edit', 'id' => $id ,  'type'=>'testimony'   , 'service'=>$service);
       

        return view('admin_folder/add_services')->with($all);
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

        $service  = servicess::find($id);
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

   
    
        return  redirect('/newsletters');
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
        $service  = servicess::find($id);
        $service->delete();

        return   redirect('/newsletters');
    }
}
