	<?php
use App\contact_detail;
use App\logos;

$contact  = contact_detail::first();


?>



    <li>  <a  href="/">  HOME   </a> </li>


<li class=""> <a  href="/page/1/about" style="cursor: pointer" title="">ABOUT US</a>

           <!-- /.sub-menu --> </li>


           <li><a href="/page/2/vission" title="">VISSION</a></li>


                <li><a href="/page/3/mission" title="">MISSION</a></li>



          <li> <a  href="/gallery_view" style="cursor: pointer"  title="">MEDIA</a>
           <ul class="sub-menu">

            <li><a href="/gallery_view" title="">Gallery</a></li>


            <!--- <li><a href="" title="">News Letter</a></li> ---->
           </ul>
           <!-- /.sub-menu --> </li>

                 <li><a href="/event" title="">EVENT</a></li>



                         <li><a href="/volunteer" title="">VOLUNTEER NOW</a></li>




                 <li><a href="{{  $contact->instagram  }}" title="">DONATE</a></li>

                 <li><a href="/contact-us" title="">CONTACT US</a></li>







