 @extends('admin_folder/index')
         @section('content')

         <?php
use App\contact_detail;

$contact   =  contact_detail::get();

if(count($contact)  > 0 ){

	$edit  =  'yes';

}

 $eachs =  contact_detail::first();

if(isset($edit)){

	  $page =  contact_detail::first();

}

?>


          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Contact Information</h3>
              </div>
              <div class="panel-body">


                <form  method="post" action="@if(isset($page)) /contact/{{ $page->id }}  @else /contact @endif"   >

                  {{ csrf_field() }}


              <?php   function inputv($label , $name , $value){     ?>

                  <div class="form-group">
                    <label>  {{  $label }}</label>
                    <input   type="text" class="form-control" placeholder="{{  $label }}" value="@if($value != ' '){{ $value }}@endif"   name="{{ $name }}" >
                  </div>

              <?php   } ?>


                 <?php

					inputv("Phone No 1" ,  'phone1'  , $eachs->phone1) ;
					inputv("Phone No 2" ,  'phone2'  , $eachs->phone2) ;
					inputv("Facebook" , 'facebook'  , $eachs->facebook) ;
					inputv("Twitter" , 'twitter'  , $eachs->twitter) ;
					inputv("Instagram" , 'google'   , $eachs->google) ;
					inputv("Pinterest" , 'pinterest'   , $eachs->pinterest) ;
					inputv("Youtube" , 'youtube'  , $eachs->youtube) ;
					inputv("Linkedin" , 'linkedin'  , $eachs->linkedin) ;
					inputv("Paystack Link" , 'instagram'  , $eachs->instagram) ;
					inputv("Address" , 'address'  , $eachs->address) ;
					inputv("Email" , 'email'  , $eachs->email) ;
					inputv("FaceBook Api Key" , 'facebookapi'  , $eachs->facebookapi) ;







					?>





                       <?php  if(isset($page)) { ?>

                              <input    type="hidden"     name="_method"   value="PUT"/>





		<input    class="btn btn-success"  type="Submit"  value="Update"  />


                       <?php  }else{    ?>




		<input    class="btn btn-success"  type="Submit"  value="Submit"  />




                  <input type="reset" class="btn btn-danger" value="Reset"    onClick="$('#preview').hide()">


                  <?php    } ?>

                </form>
              </div>
              </div>

          </div>
       @endsection

