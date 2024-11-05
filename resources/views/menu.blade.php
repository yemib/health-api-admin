<?php
use App\contact_detail;
use App\logos;

$contact  = contact_detail::first();
$logo  = logos::first();

?>


    <div class="header-inner"   style="background-color: rgba(3,247,46,0.19)">

   <header class="style1" id="header">
    <div id="site-header">
     <div class="container-fluid">
      <div class="header-wrap clearfix">
       <div id="logo" class="logo">
        <a href=""><img    style="border-radius: 100%" src="{{ $logo->image }}" alt="image" width="100" height="40" data-retina="{{ $logo->image }}" data-width="100" data-height="40"></a>
       </div>
       <div class="mobile-button">
        <span></span>
       </div>





       <div class="nav-wrap ">
        <nav id="mainnav" class="mainnav">
         <ul class="menu"   style="text-transform:capitalize">

         <li>  <a  href="/">  HOME   </a> </li>




          <li class=""> <a  href="/page/1/about" style="cursor: pointer" title="">ABOUT US</a>

           <!-- /.sub-menu --> </li>

            <li><a href="/page/2/vission" title="">VISSION</a></li>

                 <li><a href="/page/3/mission" title="">MISSION</a></li>


          <li> <a  style="cursor: pointer"  title="">MEDIA</a>
           <ul class="sub-menu">

            <li><a href="/gallery_view" title="">Gallery</a></li>


            <!--- <li><a href="" title="">News Letter</a></li> ---->
           </ul>
           <!-- /.sub-menu --> </li>

                 <li><a href="/volunteer" title="">VOLUNTEER NOW</a></li>




                 <li><a href="/donate" title="">DONATE</a></li>




         </ul>
        </nav>
       </div>
       <!-- /.nav-wrap -->
      </div>
     </div>
    </div>
   </header>
  </div>
