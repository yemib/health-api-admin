<!---thhe banner is here  ---->
@extends('layouts.index2')
<?php

use App\page;

$page = page::find($id);

?>


@section('title')
    {{ $page->title }}
@endsection


@section('content')



    <header class="jumbotron text-center bg-success text-white py-5">
        <div class="container">
            <h1 class="display-4 mb-4" style="padding-top: 50px;">🌍 {{ $page->title }} </h1>
        </div>
    </header>



    <div class="container mt-5"  style="margin-bottom: 50px">
        <!-- Post Title -->
        <h1 class="display-4"> {{ $page->title }}</h1>

        <!-- Post Body -->
        <p class="lead" style="color: black;">
            {!! $page->body !!}
        </p>

    </div>





@endsection
