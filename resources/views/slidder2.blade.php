<?php

use App\slidders;
use App\page;

$moving_news = page::find(5);

$select_slide = slidders::where('publish', 'yes')
    ->orderby('created_at', 'desc')
    ->paginate(80);

?>





<div class="hero-section">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <?php  $count    =  0 ;     foreach($select_slide  as $slidder) {  ?>

            <div class="swiper-slide" style="">
                <div class="slide-content"  style="width:100% !important;   height: 200px ;  overflow: auto ; padding: 5px">
                    <h1   align="center" class="hero-title"> {{ $slidder->text1 }}   </h1>
                    <p align="center" class="hero-subtitle">{{ $slidder->text2 }}</p>
                    {{-- <a  href="/gallery_view"  style="opacity: 0.5" class="btn btn-primary btn-lg">Gallery</a>  --}}
                </div>
                <img src="{{ $slidder->image }}"
                alt="" class=" hero-image"   >
            </div>

            <!-- Slide 2 -->
            <?php     $count++;    }?>

            <!-- Add more slides as needed -->

        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>
