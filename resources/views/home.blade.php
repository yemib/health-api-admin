<!---thhe banner is here  ---->
  @extends('layouts.index')

@section('content')
  
  <?php  

use App\servicess;
use App\page;
use App\contact_detail;
use App\slidders;
use App\logos;
use App\management;

$management  = management::where('publish' , 'yes')->paginate(10);

$logo = logos::first();
$service  = servicess::where('publish' , 'yes')->orderby('id', 'asc')->get();


$contact  = contact_detail::first();

$select_slide  = slidders::where('publish' , 'yes')->orderby('id'  , 'desc')->get();

?>



@section('slidder')

@include('slidder')
     
@endsection
   

  
  
    <section class="flat-features-5"> 
    <div class="container"> 
     <div class="row"> 
      <div class="col-lg-6 col-md-6 col-sm-6"> 
       <div class="title-features-5"> 
        
        <h2>Welcome To Whole Planet Initiative . </h2> 
       </div> 
      </div> 
      <div class="col-lg-6 col-md-6 col-sm-6"> 
       <div class="content-features-5"> 
       
       <!---   echo home here   ---->
       
       
       <?php  
		   $vision  = page::find(2);
		   $mission  = page::find(3);
		   
		   ?>
       
        <p> 
        <h1> Our Vision </h1>
        
		   <span  style="color: black">     {!!   $vision->body   !!}  </span>
          
          
           <h1> Our Mission </h1>
            <span  style="color: black"> {!!    $mission->body   !!}  </span>
          
          </p> 
        
        
        
        
        <div class="inner-features-5 clearfix"> 
         <div class="image-features-5"> 
          <div class="wrap-btn"> 
          <a href="/page/1/about" class="flat-button-arrow">Read More</a> 
         </div>
         </div> 
         <div class="name-features-5"> 
          
         </div> 
        </div> 
        
        
        
        
       </div> 
      </div> 
     </div> 
    </div> 
   </section> 
   
   
   
   
   
   
   <section class="flat-services"> 
    <div class="container"> 
     <div class="row fix-height-box"> 
      <div class="col-sm-12"> 
       <div class="title-section style1"> 
        <p></p> 
        <div class="content-inner clearfix"> 
         <div class="wrap-contentt"> 
          <h2><a href="">Newsletter</a></h2> 
         </div> 
        
        </div> 
       </div> 
      </div>
      
       <?php    foreach($service  as $service)   {  ?>
         
      <div class=" col-md-4 col-sm-6"  style="position: relative"> 
       <div class="wrap-services clearfix mobi-mt40"> 
        <div class="image-services"> 
         <img  height="100"  width="100" src="{{ $service->image }}" alt="image"> 
        </div> 
        <div class="content-services"> 
         <h2><a href="/newsletter/{{ $service->id }}/{{ $service->title }}">{{ $service->title }}</a></h2> 
         
         <div  style="height: 200px ; overflow: hidden;">{!! $service->body !!} </div> 
          
          <div  style="position: absolute; bottom: -40px; ">
           <div class="wrap-btn"> 
          <a href="/newsletter/{{ $service->id }}/{{ $service->title }}" class="flat-button-arrow">Read More</a> 
         </div> 
         </div>
        </div> 
       </div> 
      </div> 
      
      <?php   } ?>
      
     </div> 
    </div> 
   </section> 
   

   <section class="flat-features-2"> 
    <div class="container"> 
     <div class="row"> 
      <div class="col-lg-12"> 
       <div class="title-section"> 
        <p>  </p> 
        <div class="content-inner clearfix"> 
         <div class="wrap-contentt"> 
          <h2><a href="#">Management Team</a></h2> 
         </div> 
       
        </div> 
       </div> 
      </div> 
      
      
    
      
       
       <?php   foreach($management  as $management){   ?>
        
          <div class="col-md-4"> 
       <article class="post"> 
        <div class="featured-post"> 
         <img src="{{ $management->image }}" alt="image"> 
        </div> 
        <div class="content-post"> 
         
         <h4><a href="#">{{ $management->name }}</a></h4> 
         
         <h5  style="color: green">  {{ $management->position }}  </h5>
         <p></p> 
        </div> 
       </article> 
      </div> 
           
           
           <?php   }?>
          
     

     
     
       <div style="clear: both" class="wrap-btn"> 
          <a href="/management" class="flat-button-arrow">View All</a> 
         </div> 
     </div> 
    </div> 
   </section> 
   

   
    
    @endsection
  