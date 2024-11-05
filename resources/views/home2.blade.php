@extends('layouts.index2')



@section('meta')

@endsection

<?php

use App\servicess;
use App\page;
use App\contact_detail;
use App\slidders;
use App\logos;
use App\management;

$management = management::where('publish', 'yes')->paginate(10);

$logo = logos::first();
$service = servicess::where('publish', 'yes')
    ->orderby('created_at', 'desc')
    ->paginate(5);

$contact = contact_detail::first();

$select_slide = slidders::where('publish', 'yes')
    ->orderby('created_at', 'desc')
    ->paginate(20);

?>
@section('logo')
https://wholeplanetinitiative.org/logo.png
@endsection

@section('title')
Home

@endsection

<?php
$vision  = page::find(2);
$mission  = page::find(3);
$mandate  = page::find(4);

?>
    <!-- Hero Section -->
@section('slidder')
    @include('slidder2')
@endsection

@section('content')



<!-- About Section -->

<div class="about-section bg-light py-5">
    <div class="container">
        <div class="row">

            <div class="col-lg-7 text-center d-flex align-items-center">
                <h1 class="display-4 text-success mb-4">Welcome To {{  config('app.name') }}</h1>
            </div>

            <div class="col-lg-5 text-center mb-4">
                <img src="logo.png" alt="Climate Change Facts" class="img-fluid zoom-in">
            </div>

        </div>
    </div>
</div>



<!-- Blog Section -->

<div class="blog-section py-5" style="position: relative;">
    <div class="container">
        <div class="row">

            <!-- Blog Content -->
            <div class="col-lg-12 text-center">
                <h2  style="color: white !important" class="display-4 text-success mb-4">Latest from Our Blog</h2>
            </div>

            <div class="col-lg-12">
                <div class="blog-scroll-container">
                    <div class="blog-scroll">
                        <!-- Blog Posts Container -->
                        <div class="blog-posts">
                            <?php   foreach($service   as $service )  {  ?>
                            <!-- Blog Post 1 -->
                            <div class="card">
                                <img data-src="{{ $service->image }}"
                                 class="card-img-top" alt="{{ $service->title }}"  loading="lazy"  />
                                <div class="card-body">
                                    <h5 class="card-title"> {{ $service->title }} </h5>

                                  {{--   <p class="card-text">A brief description of the content in
                                        this blog post. It can span multiple lines.</p> --}}
                                        <?php 

                                        $modified_sentence = str_replace(' ', '_', $service->title);
                                        $modified_sentence = str_replace('.', '',  $modified_sentence);

                                        $modified_sentence;

                                        ?>

                                    <a href="/newsletter/{{$service->id}}/{{$modified_sentence}}"
                                         class="btn btn-primary">Read More</a>
                                </div>
                            </div>

                            <?php   }?>
                            <!-- Add more blog posts as needed -->

                        </div>


                    </div>
                    <div
                    align="center"><br/> <a  href="/event"  class="btn btn-primary"> View All </a> </div>


                </div>




            </div>

        </div>
    </div>
    <!-- Arrow Buttons -->
    <button class="arrow-btn left-btn" onclick="scrollBlogPosts(-1)">&#8249;</button>
    <button class="arrow-btn right-btn" onclick="scrollBlogPosts(1)">&#8250;</button>
</div>

<!-- Facts Section -->
<div class="facts-section">
    <div class="container">
        <h2></h2>
        <div class="row">

            <div class="col-lg-6">
                <div class="fact-card">
                    <h3>Our Vision</h3>
                    <p style="color: black;">
                        <?php  

                        $text_with_img = $vision->body;

                        $clean_text = strip_tags($text_with_img, '<p><a><strong><em><u><div>'); // Keep <p>, <a>, <strong>, <em>, <u> tags
                        
                        echo $clean_text;

                        ?>
                        
                        
                     
                    
                    
                    </p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="fact-card">
                    <h3>Our Mission</h3>
                    <p style="color: black;">

                        <?php  

                        $text_with_img = $mission->body;

                        $clean_text = strip_tags($text_with_img, '<p><a><strong><em><u><div>'); // Keep <p>, <a>, <strong>, <em>, <u> tags
                        
                        echo $clean_text;

                        ?>
                        
                      
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Contact Form Section -->
<div   style="display: none" class="contact-section">
    <div class="container">
        <h2>Contact Us</h2>
        <form id="contact-form">
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Your Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
        </form>
    </div>
</div>

<style>
    .card {
        transition: transform 0.3s, box-shadow 0.3s;
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        background: linear-gradient(to bottom, #393d3f, #142f41);
        color: #fff;
        position: relative;
    }



    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
    }

    .card-body {
        position: relative;
        z-index: 2;
    }

    .card-title {

        font-weight: bold;
        margin-bottom: 10px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        color: #fff;
         /* Ensure title is visible */


    }

    .card-text {
        font-size: 1.2rem;
        margin-bottom: 20px;
        color: #f0f0f0; /* Adjust text color for better visibility */
    }

    .badge {
        background-color: #2ecc71;
        font-size: 0.8rem;
        padding: 0.5rem 0.8rem;
    }

    .btn-primary {
        background-color: #2ecc71;
        border: none;
        transition: background-color 0.3s;
        box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .btn-primary:hover {
        background-color: #27ae60;
    }
</style>


@endsection
