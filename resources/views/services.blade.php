<!---thhe banner is here  ---->
@extends('layouts.index2')


<?php

use App\servicess;

$page = servicess::find($id);

?>


@section('facebook_link')
<?php 

$modified_sentence = str_replace(' ', '_', $page->title);
$modified_sentence = str_replace('.', '',  $modified_sentence);

$modified_sentence;

?>
 https://wholeplanetinitiative.org/{{$page->id}}/{{$modified_sentence}}
@endsection

@section('meta')


<?php  
$plainText = strip_tags(  $page->body );  
$words = explode(' ', $plainText);
$shortened = implode(' ', array_slice($words, 0, 20));

$string =  $page->image ;
$substring = "https";

if (strpos($string, $substring) !== false) {
    //echo "The string contains an https link.";
    $logo  =   $page->image ;
} else {
   $logo  =  "https://wholeplanetinitiative.org$page->image";
}
?>
<!-- Open Graph Meta Tags -->
<meta property="og:title" content="{{ $page->title }}">
<meta property="og:description" content="{{  $shortened  }}">
<meta property="og:image" content="{{  $logo }}">
<meta property="og:url" content="https://wholeplanetinitiative.org/{{$page->id}}/{{$modified_sentence}}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="{{  config('app.name') }}">
<meta property="og:locale" content="en_NG">
<meta name="twitter:card" content="{{ $logo }}">
<meta name="twitter:site" content="@GlobalImpact_AM">
<meta name="twitter:title" content="{{ $page->title }}">
<meta name="twitter:description" content="{{  $shortened  }}">
<meta name="twitter:image" content="{{  $logo }}">
@endsection

@section('logo')
{{  $logo }}
@endsection




@section('title')
{{ $page->title }}

@endsection

@section('title')
    {{ $page->title }}
@endsection





@section('content')
    <header class="jumbotron text-center bg-success text-white py-5">
        <div class="container">
            <h1 class="display-4 mb-4" style="padding-top: 50px;"> {{ $page->title }} </h1>
        </div>
    </header>



    <div class="container mt-5" style="margin-bottom: 50px; overflow: auto">
        <!-- Post Title -->
        <h1 class="display-4"> {{ $page->title }}</h1>

        <img  height="300"  style="width: auto"  data-src="{{ $page->image }}"  loading="lazy" />

        <!-- Post Body -->
        <div class="lead" style="color: black !important;">
            {!! $page->body !!}
        </div>

    </div>
@endsection
