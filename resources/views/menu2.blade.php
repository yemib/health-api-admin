<?php
use App\contact_detail;
use App\logos;

$contact = contact_detail::first();
$logo = logos::first();

?>



<header class="site-navbar js-sticky-header site-navbar-target" role="banner">

    <div class="container">
      <div class="row align-items-center">

        <div class="col-6 col-xl-2">
          <h1 class="mb-0 site-logo"><a href="/">
             <img  id="logo" alt="LOGO."  height="100"  width="120"  src="/logo.png" /><span class="text-primary"></span> </a>
            </h1>
        </div>

        <div class="col-12 col-md-10 d-none d-xl-block">
          <nav class="site-navigation position-relative text-right" role="navigation">

            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
              <li><a href="/" class="nav-link">Home</a></li>


              <li class="has-children">
                <a href="#about-section" class="nav-link">About Us</a>
                <ul class="dropdown">
                  <li><a href="/page/1/about" class="nav-link">About Us</a></li>
                  <li><a href="/management" class="nav-link">Management</a></li>


                </ul>
              </li>




              <li><a href="/gallery_view" class="nav-link">Media</a></li>
              <li><a href="/event" class="nav-link">News</a></li>
              <li><a href="/volunteer" class="nav-link">Volunteer Now</a></li>
             <!-- <li><a href="//management" class="nav-link">Management</a></li>  --->
              <li><a href="/donate" class="nav-link">Donate</a></li>
              <li><a href="/contact-us" class="nav-link">Contact Us</a></li>

              <li class="social"><a href="<?php echo  $contact->facebook ;   ?>" target="_blank" class="nav-link"><span class="icon-facebook"></span></a></li>
              <li class="social"><a href="<?php echo  $contact->twitter ;   ?>" target="_blank" class="nav-link"><span class="icon-twitter"></span></a></li>
              <li class="social"><a href="<?php echo  $contact->linkedin ;   ?>" target="_blank" class="nav-link"><span class="icon-linkedin"></span></a></li>
              <li class="social"><a href="<?php echo  $contact->youtube ;   ?>" target="_blank" class="nav-link"><span class="icon-youtube"></span></a></li>
            </ul>
          </nav>
        </div>


        <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>

      </div>
    </div>

  </header>






