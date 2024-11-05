<!---thhe banner is here  ---->
@extends('layouts.index2')

@section('content')
    <?php

    use App\servicess;
    use App\page;
    use App\contact_detail;
    use App\slidders;
    use App\logos;
    use App\management;

    $service = servicess::where('publish', 'yes')
        ->orderby('created_at', 'desc')
        ->paginate(12);

    ?>
@section('title')
    Whole Planet Initiative News
@endsection


<!-- Hero Section -->

<header class="jumbotron text-center bg-success text-white py-5">
    <div class="container">
        <h1 class="display-4 mb-4" style="padding-top: 50px;">🌍 Whole Planet Initiative News </h1>
    </div>
</header>


<div class="container mt-4">
    <div class="row">
        <!-- Blog post cards go here -->

<?php  foreach($service  as $news)  {   ?>
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <img loading="lazy"  height="300"  width="300"  data-src = "{{ $news->image }}"   class="card-img-top" alt="{{ $news->title }}">
                <div class="card-body">
                    <h5 class="card-title text-primary"> {{ $news->title }}</h5>

                    {{--
                    <div class="card-text" style="height: 100px ; overflow: hidden ; text-overflow: ellipsis">
                        {!! $news->body !!}

                    </div>  --}}
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">Published on:  {{  date_format($news->created_at  ,  'M d , Y')  }}</small>

                    </div>

                    <?php 

                    $modified_sentence = str_replace(' ', '_', $news->title);
                    $modified_sentence = str_replace('.', '',  $modified_sentence);

                    $modified_sentence;

                    ?>
                    <div class="mt-3">
                        <a href="/newsletter/{{ $news->id }}/{{ $modified_sentence }}" class="btn btn-primary btn-sm">Read More</a>
                    </div>
                </div>
            </div>
        </div>


        <?php    }?>

        <div  class="col-sm-12">

        <div  class="pagination">

            <?php echo $service->links(); ?>
        </div>

    </div>

    </div>
</div>

<style>
    .card {
        transition: transform 0.3s, box-shadow 0.3s;
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        background: linear-gradient(to bottom, #3498db, #2980b9);
        color: #fff;
        position: relative;
    }

    .card:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.9));
        z-index: 1;
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
        font-size: 1.8rem;
        font-weight: bold;
        margin-bottom: 10px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        color: #fff; /* Ensure title is visible */
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
