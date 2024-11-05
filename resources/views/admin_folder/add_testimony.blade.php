@extends('admin_folder/index')
@section('content')

<?php
use App\servicess;

if(isset($edit)){



}

?>


 <div class="col-md-9">
   <!-- Website Overview -->
   <div class="panel panel-default">
     <div class="panel-heading main-color-bg">
       <h3 class="panel-title">Add Testimony</h3>
     </div>
     <div class="panel-body">

      <a   class="btn btn-primary" href="/testimony"> Testimony  List     </a>



       <form    method="post" action="@if(isset($service)) /testimony/{{ $service->id }}  @else /testimony @endif"  enctype="multipart/form-data"   >

         {{ csrf_field() }}

         <div class="form-group">
           <label>Title</label>
           <input  required type="text" class="form-control" placeholder="Title" value="@if(isset($service)) {{$service->title}} @endif"   name="title" >
         </div>


          <div class="form-group">
           <label>Body</label>
           <br/>

             @include('admin_folder/tools')


          <br/>


             <div  id="progress_id"> </div>


           <div   style="height: 300px ; overflow: auto;position: relative"  onDblClick="$('.tool_container').hide(500)"   onClick="$('.tool_container').show(500)" id="el"  contenteditable="true"     class="form-control  preview"> @if(isset($service)) {!! $service->body !!} @endif </div>




           <textarea style="display: none" id="tex" name="body" class="form-control" placeholder="Service Body"></textarea>
         </div>




         <div class="form-group">

          <div   id="preview" @if(isset($service)) style="background-image: url({{ $service->image }}); height: 200px"  @endif >       </div>


          <input  id="pre_input"     type="hidden"   name="image"    />


           <label  class="btn btn-primary"  for="file-input">Upload Featured  Image</label>



         <div class="checkbox">

           <?php  if(isset($service)) { ?>

           <label>

             <input  name="publish"   value="yes"  @if($service->publish  =='yes')  checked @endif  type="checkbox"> Published
           </label>


            <?php   } else{   ?>

           <label><input  name="publish"   value="yes"    type="checkbox" checked> Published</label>

           <?php   } ?>
         </div>

          <input       type="file"   style="display: none"   id="file-input"   name="picture" >
         </div>


              <?php  if(isset($service)) { ?>

                     <input    type="hidden"     name="_method"   value="PUT"/>

<input   onClick="acceptm('el' , 'tex');acceptm('topic_div' , 'topic_text')"  onMouseOver="acceptm('el' , 'tex');acceptm('topic_div' , 'topic_text')"  class="btn btn-success"  type="Submit"  value="Update"  />




              <?php  }else{    ?>

           <input   onClick="acceptm('el' , 'tex');acceptm('topic_div' , 'topic_text')"  onMouseOver="acceptm('el' , 'tex');acceptm('topic_div' , 'topic_text')"  class="btn btn-success"  type="Submit"  value="Submit"  />




         <input type="reset" class="btn btn-danger" value="Reset"    onClick="$('#preview').hide()">




         <?php    } ?>

       </form>
           <form  id="form_id"   enctype="multipart/form-data">
             {{ csrf_field() }}

          <input     name="others"    type="file"   style="display: none"    id="file-article"    class="file-article" >

         </form>
     </div>
     </div>

 </div>
@endsection

