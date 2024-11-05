<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\contact_detail;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\servicess;
use App\gallery;
use App\slidder;

class fromfacebook extends Controller
{





    public function __construct()
    {
   if(!Schema::hasColumn('galleries'  ,  'facebookid') ){

   DB::statement('ALTER TABLE galleries  ADD  COLUMN  facebookid  TEXT');
   } 
   if(!Schema::hasColumn('slidders'  ,  'facebookid') ){

   DB::statement('ALTER TABLE slidders  ADD  COLUMN  facebookid  TEXT');
   } 


    }





    // Function to fetch data from the Facebook API
    function fetchDataFromFacebookAPI($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error: ' . curl_error($ch);
        }

        curl_close($ch);

        return json_decode($response, true);
    }

    // Function to process and display posts
    function processPosts($response)
    {
        // Your logic to process and display posts goes here
        // Example: Loop through $response['data'] to access each post



        foreach ($response['data'] as $output) {
            // The Facebook timestamp
            $facebookTimestamp = $output['created_time'];

            // Convert the Facebook timestamp to Carbon instance
            $carbonDate = Carbon::parse($facebookTimestamp);

            // Get the Laravel created_at formatted timestamp
            $laravelCreatedAt = $carbonDate->toDateTimeString();
            //check with id before inserting okay!
            $check  = servicess::where('facebookid', $output['id'])->count();
            if ($check  ==  0) {
                if (isset($output['message'])) {
                    $save  =  new servicess();
                    $save->body  = $output['message'];
                    if (isset($output['full_picture'])) {
                        $save->image  = $output['full_picture'];
                    } else {
                        $save->image  =  '  ';
                    }
                    $save->facebookid  = $output['id'];
                    $save->created_at  = $laravelCreatedAt;

                    $string = $output['message'];

                    // Use str_word_count to split the string into an array of words
                    $words_array = str_word_count($string, 1);

                    // Extract the first 6 words
                    $first_six_words = array_slice($words_array, 0, 6);

                    // Join the words back into a string
                    $result = implode(' ', $first_six_words);

                    $save->title  =  $result . '...';

                    $save->publish  = 'yes';

                    $save->save();
                }
            }
            /* print_r($output);
		echo  "<br/> <br/><br/>"; */
        }
    }



    function GalleryPosts($response)
    {
        // Your logic to process and display posts goes here
        // Example: Loop through $response['data'] to access each post
        foreach ($response['data'] as $output) {
            // The Facebook timestamp
            $facebookTimestamp = $output['created_time'];

            // Convert the Facebook timestamp to Carbon instance
            $carbonDate = Carbon::parse($facebookTimestamp);

            // Get the Laravel created_at formatted timestamp
            $laravelCreatedAt = $carbonDate->toDateTimeString();
            //check with id before inserting okay!
            $check  = gallery::where('facebookid', $output['id'])->count();
            if ($check  ==  0) {
                if (isset($output['full_picture'])) {
                    $save  =  new gallery();
                    //$save->body  = $output['message'];
                    if (isset($output['full_picture'])) {
                        $save->image  = $output['full_picture'];
                    } 
                    $save->facebookid  = $output['id'];
                    $save->created_at  = $laravelCreatedAt;
                    $save->text1  = ' ';


                    $save->publish  = 'yes';

                    $save->save();
                }
            }
            /* print_r($output);
		echo  "<br/> <br/><br/>"; */
        }
    }



    

    function SlidderPosts($response)
    {
        // Your logic to process and display posts goes here
        // Example: Loop through $response['data'] to access each post
        foreach ($response['data'] as $output) {
            // The Facebook timestamp
            $facebookTimestamp = $output['created_time'];

            // Convert the Facebook timestamp to Carbon instance
            $carbonDate = Carbon::parse($facebookTimestamp);

            // Get the Laravel created_at formatted timestamp
            $laravelCreatedAt = $carbonDate->toDateTimeString();
            //check with id before inserting okay!
            $check  = slidder::where('facebookid', $output['id'])->count();
            if ($check  ==  0) {
                if (isset($output['full_picture'])) {
                    $save  =  new slidder();
                    //$save->body  = $output['message'];
                    if (isset($output['full_picture'])) {
                        $save->image  = $output['full_picture'];
                    } 
                    $save->facebookid  = $output['id'];
                    $save->created_at  = $laravelCreatedAt;
                    $save->text1  = ' ';
                    $save->text2  = ' ';


                    $save->publish  = 'yes';

                    $save->save();
                }
            }
            /* print_r($output);
		echo  "<br/> <br/><br/>"; */
        }
    }


    function   upload_post()
    {



        $page_id = "110709393678809";

        $tokenmanager  =  contact_detail::first();
        $access_token =   $tokenmanager->facebookapi;

        // Initial request to get the first set of posts
        $initial_url = "https://graph.facebook.com/v19.0/$page_id/feed?access_token=$access_token&fields=full_picture,message,created_time";

        do {
            $response = $this->fetchDataFromFacebookAPI($initial_url);

            // Process the current set of posts
            $this->processPosts($response);
            $this->SlidderPosts($response);
            $this->GalleryPosts($response);

            // Check for the next page in the 'paging' object
            if (isset($response['paging']['next'])) {
                $initial_url = $response['paging']['next'] . "&fields=full_picture,message,created_time";
            } else {
                // If 'next' is not available, exit the loop
                break;
            }
        } while (true);


        //return test when  done and  refresh 

        return  "<h1>  Update Done Successfully </h1>   <script>window.location.href='https://wholeplanetinitiative.org/'</script>";
    }
}
