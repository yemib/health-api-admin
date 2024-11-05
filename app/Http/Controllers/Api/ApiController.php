<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\servicess;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //

    public function blog(){
        $service = servicess::orderby('created_at'  , 'desc')->paginate(2);
    

        return response()->json( $service);
    }
}
