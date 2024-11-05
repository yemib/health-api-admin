@extends('layouts.index')

@section('content')



<?php   use App\page_content;

$home_content  =page_content::where('page' , 'faqs')->first();
?>




<div  class="container"   id="space_up"  >



<div  class="row">

<div   class="col-sm-12"   style="overflow: auto">

{!! $home_content->content  !!}



</div>


</div>



</div>




@endsection
