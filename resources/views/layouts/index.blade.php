<!DOCTYPE html>
<?php 
use App\page;
use App\contact_detail;
use App\logos;

$pages = page::where('publish'  , 'yes')->paginate(6);

$contact  = contact_detail::first();
$logo  = logos::first();


?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
 <head> 
  <!-- Basic Page Needs --> 
  <meta charset="utf-8"> 
  <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]--> 
  <title>@yield('title')   Whole Planet Initiative</title> 
  
  
  <meta name="author" content="themesflat.com"> 
  <!-- Mobile Specific Metas --> 
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
  <!-- Bootstrap  --> 
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.css"> 
  <!-- Theme Style --> 
  <link rel="stylesheet" type="text/css" href="/css/style.css"> 
  <!-- Responsive --> 
  <link rel="stylesheet" type="text/css" href="/css/responsive.css"> 
  <!-- Colors --> 
  <link rel="stylesheet" type="text/css" href="/css/color1.css" id="colors"> 
  <link rel="stylesheet" type="text/css" href="css"> 
  <!-- Animation Style --> 
  <link rel="stylesheet" type="text/css" href="/css/animate.css"> 
  <!-- Favicon and touch icons  --> 
  <link href="{{ $logo->image  }}" rel="apple-touch-icon-precomposed" sizes="48x48"> 
  
  
  <link href="{{ $logo->image  }}" rel="apple-touch-icon-precomposed"> 
  <link href="{{ $logo->image  }}" rel="shortcut icon"> 
  <!-- Slider Revolution CSS Files --> 
  <link rel="stylesheet" type="text/css" href="/css/settings.css"> 
  <link rel="stylesheet" type="text/css" href="/css/layers.css"> 
  <link rel="stylesheet" type="text/css" href="/css/navigation.css"> 
  
  

 </head> 
 <body> 
  <div id="loading-overlay"> 
   <div class="loader"></div> 
  </div> 
  <!-- /.loading-overlay --> 
 
 
 @include('menu')
 
 

@yield('slidder')

  
  <div class="main-homepage1 mobi-mt30"> 
  
  
   
    @yield('content')
   
  </div> 
  
  
  <footer class="style1"> 
   <div class="container"> 
    <div class="row"> 
     <div class="col-lg-4 col-md-6 col-sm-6"> 
      <div class="widget-text"> 
       <a href="/"><img  style="border-radius: 100%"  height=""  width="100"  src="{{ $logo->image  }}" alt="image"></a> 
       
 
       
      </div> 
   
      <!-- /widget-contact --> 
     </div> 
     <div class="col-lg-2 col-md-6 col-sm-8"> 
      <div class="widget-pages widget-list"> 
       <h2 class="widget-title">Pages</h2> 
       <ul> 
        <li><a href="/page/16/about"><i class="ti-more-alt" aria-hidden="true"></i><span> About Us </span></a></li> 
        
        <li><a href="/management"><i class="ti-more-alt" aria-hidden="true"></i><span>Management Team </span></a></li> 
        
        
       
        
       
        
      
        
       
      
        
       
        
        
       </ul> 
      </div> 
     </div> 
     <div   class="col-sm-12">
      <p>  <a   href="tel: {{$contact->phone1}}" style="color:rgba(0,0,0,1.00)">   {{$contact->phone1}}   </a>    </p> 
      
        <p>  <a   href="malto: {{$contact->email}}" style="color:rgba(0,0,0,1.00)">   {{$contact->email}}   </a>    </p> 
        
            
                    <p>  <span   style="color:rgba(0,0,0,1.00)">   {{$contact->address}}   </span>    </p>  
                    
                      </div>
     
    </div> 
   </div> 
  </footer> 
  <div class="bottom"> 
   <div class="container"> 
    <div class="row"> 
     <div class="col-lg-12"> 
      <div class="wrap-bottom clearfix"> 
       <div class="title-bottom"> 
        <p>(C) Whole Planet Initiative LTD. 2020.</p> 
       </div> 
       <div class="social-bottom"> 
        <ul> 
         <li class="social-share"><a href="{{$contact->facebook}}"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
          
         <li class="social-share"><a href="{{$contact->twitter}}"><i class="fab fa-twitter" aria-hidden="true"></i></a></li> 
         
        
         
   
         
         <li class="social-share"><a href="{{$contact->linkedin}}"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li> 
        </ul>
        
       
       </div> 
      </div> 
     </div> 
    </div> 
   </div> 
  </div> 

  
  <a id="scroll-top"><i class="fas fa-arrow-up"></i></a> 
  <script src="/js/jquery.min.js"></script> 
  <script src="/js/main.js"></script> 
  <script src="/js/rev-slider.js"></script> 
  <script src="/js/owl.carousel.min.js"></script> 
  <script src="/js/jquery-countTo.js"></script> 
  <script src="/js/jquery-waypoints.js"></script> 
  <script src="/js/bootstrap.min.js"></script> 
  <script src="/js/images-loaded.js"></script> 
  <script src="/js/jquery.isotope.min.js"></script> 
  <script src="/js/jquery-fancybox.js"></script> 
  <script src="/js/jquery.easing.js"></script> 
  <!-- Slider --> 
  <script src="/js/jquery.themepunch.tools.min.js"></script> 
  <script src="/js/jquery.themepunch.revolution.min.js"></script> 
  <script src="/js/rev-slider.js"></script> 
  <!-- Load Extensions only on Local File Systems ! The following part can be removed on Server for On Demand Loading --> 
  <script src="/js/revolution.extension.actions.min.js"></script> 
  <script src="/js/revolution.extension.carousel.min.js"></script> 
  <script src="/js/revolution.extension.kenburn.min.js"></script> 
  <script src="/js/revolution.extension.layeranimation.min.js"></script> 
  <script src="/js/revolution.extension.migration.min.js"></script> 
  <script src="/js/revolution.extension.navigation.min.js"></script> 
  <script src="/js/revolution.extension.parallax.min.js"></script> 
  <script src="/js/revolution.extension.slideanims.min.js"></script> 
  <script src="/js/revolution.extension.video.min.js"></script>  
 </body>
</html>