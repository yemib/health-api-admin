<?php

namespace App\Http\Controllers\Api;

use App\board;
use App\contact_detail;
use App\gallery;
use App\Http\Controllers\Controller;
use App\logos;
use App\Mail\GeneralMessage;
use App\page;
use App\servicess;
use App\testimony;
use Illuminate\Http\Request;
use App\Mail\SendMessage;
use App\management;
use App\slidders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ApiController extends Controller
{
    //
    private $pages_constant;

    public function __construct()
    {
        $this->pages_constant =   20;
    }

    public function blog($pages =  null)
    {

        if ($pages) {

            $page_no  =  $pages;
        } else {
            $page_no  =   $this->pages_constant;
        }
        try {
            $service = servicess::where('publish',  'yes')->orderby('created_at', 'desc')->paginate($page_no);


            return response()->json($service);
        } catch (\Exception   $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function singleblog($slug)
    {

        try {
            $service = servicess::where('slug', $slug)->first();

            if (isset($service->id)) {
                return response()->json($service);
            }
            return response()->json(['message' => "blog can't be found"]);
        } catch (\Exception   $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }


    public function singleblogid($id)
    {

        try {
            $service = servicess::find($id);

            if (isset($service->id)) {
                return response()->json($service);
            }
            return response()->json(['message' => "blog can't be found"]);
        } catch (\Exception   $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }




    public function testimonies($pages =  null)
    {

        if ($pages) {

            $page_no  =  $pages;
        } else {
            $page_no  =    $this->pages_constant;
        }
        try {
            $service = testimony::where('publish',  'yes')->orderby('created_at', 'desc')->paginate($page_no);


            return response()->json($service);
        } catch (\Exception   $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }


    public function managements($pages =  null)
    {

        if ($pages) {

            $page_no  =  $pages;
        } else {

            $page_no  =    $this->pages_constant;
        }
        try {
            $service = management::orderby('created_at', 'desc')->paginate($page_no);

            return response()->json($service);
        } catch (\Exception   $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }
    public function gallery($pages =  null)
    {

        if ($pages) {

            $page_no  =  $pages;
        } else {

            $page_no  =    $this->pages_constant;
        }
        try {
            $service = gallery::orderby('created_at', 'desc')->paginate($page_no);

            return response()->json($service);
        } catch (\Exception   $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function slides($pages =  null)
    {

        if ($pages) {

            $page_no  =  $pages;
        } else {

            $page_no  =    $this->pages_constant;
        }
        try {
            $service = slidders::orderby('created_at', 'desc')->paginate($page_no);

            return response()->json($service);
        } catch (\Exception   $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function logo()
    {


        try {
            $service = logos::first();

            return response()->json($service);
        } catch (\Exception   $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }


    public function contact()
    {


        try {
            $service = contact_detail::first();

            return response()->json($service);
        } catch (\Exception   $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }





    public function allpages($pages =  null)
    {

        if ($pages) {

            $page_no  =  $pages;
        } else {
            $page_no  =    $this->pages_constant;
        }
        try {
            $service = page::where('publish',  'yes')->orderby('created_at', 'desc')->paginate($page_no);


            return response()->json($service);
        } catch (\Exception   $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }

    public function  page($id)
    {

        try {
            $service = page::find($id);

            if (isset($service->id)) {
                return response()->json($service);
            } else {
                return response()->json(['message' => "No page is found"]);
            }
        } catch (\Exception   $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
    }


    public function sendmail(Request  $request)
    {

        $data  =  [];

        // Collect POST data
        $data = $_REQUEST;


        $data['subject'] =  "Appointment";
        foreach ($data as $key => $value) {
            $data[$key] = $value;
        }


        /* return new SendMessage($data)  ; */
        $contact  =  contact_detail::first();
        if ($contact->email  !=  NULL) {

            //send mail html ......
            // To send HTML mail, the Content-type header must be set to text/html
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // Additional headers
            $fromName = config('mail.from.name'); // Change this to your preferred sender name
            $fromEmail = "info@tinkahealthservices.com"; // Change this to your email
            $headers .= "From: $fromName <$fromEmail>" . "\r\n";
            $to = $contact->email;
            $subject = $data['subject'];
            $message =   view('mail.mailsend', compact('data'))->render();
            if (isset($data['message'])) {

                mail($to, $subject, $message, $headers);
            }

            return response()->json(['message' => 'successful']);
        } else {
            return response()->json(['message' => 'Please provide the contact email in admin']);
        }
    }


    public function generalmail(Request  $request)
    {


        if (isset($request->websitename)) {
            config(['app.name'   => $request->websitename]);
            config(['mail.from.name' => $request->websitename]);
        } else {
            config(['app.name'   => " "]);
            config(['mail.from.name' => " "]);
        }



        $data  =  [];

        if (isset($request->message)) {
            $data['message'] =  $request->message;
        }

        if (isset($request->subject)) {

            $data['subject'] =  $request->subject;
        } else {
            $data['subject'] =   "";
        }

        /* return new SendMessage($data)  ; */


        if (isset($request->email)) {

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // Additional headers
            $fromName = config('mail.from.name'); // Change this to your preferred sender name
            $fromEmail = "info@tinkahealthservices.com"; // Change this to your email
            $headers .= "From: $fromName <$fromEmail>" . "\r\n";

            $to = $request->email;
            $subject = $data['subject'];
            $message =   view('mail.generalsend', compact('data'))->render();

            mail($to, $subject, $message, $headers);

            //Mail::to($request->email)->send(new GeneralMessage($data));

            return response()->json(['message' => 'successful']);
        } else {
            return response()->json(['message' => 'Please provide the Email']);
        }
    }
}
