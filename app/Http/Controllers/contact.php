<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\contact_detail;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class contact extends Controller
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

        return  view('admin_folder/contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // this only exist if is empty  

        $contact  =   new contact_detail();


        $contact->facebook = $request->facebook;
        $contact->twitter = $request->twitter;
        $contact->google = $request->google;
        $contact->pinterest = $request->pinterest;
        $contact->youtube = $request->youtube;
        $contact->linkedin = $request->linkedin;
        $contact->instagram = $request->instagram;
        $contact->phone1 = $request->phone1;
        $contact->phone2 = $request->phone2;
        $contact->facebookapi  =  $request->facebookapi;
        $contact->save();



        return  redirect('/contact');
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

        $contact  = contact_detail::find($id);


        $contact->facebook = ($request->facebook != '') ? $request->facebook :  ' ';
        $contact->twitter = ($request->twitter != '') ? $request->twitter  : ' ';
        $contact->google = ($request->google   != '') ? $request->google : ' ';
        $contact->pinterest = ($request->pinterest  != '') ? $request->pinterest : ' ';
        $contact->youtube = ($request->youtube != '') ?  $request->youtube : ' ';
        $contact->linkedin = ($request->linkedin != '') ?  $request->linkedin  : ' ';
        $contact->instagram = ($request->instagram != '') ?  $request->instagram   : ' ';
        $contact->phone1 = ($request->phone1 != '') ?  $request->phone1  : ' ';
        $contact->phone2 = ($request->phone2 != '') ?  $request->phone2  :  ' ';
        $contact->address = ($request->address != '') ?  $request->address  :  ' ';
        $contact->email = ($request->email != '') ?  $request->email  :  ' ';

        $contact->save();

?>
        <script>
            alert('updated');
        </script>
<?php


        return  view('admin_folder/contact');
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
    }
}
