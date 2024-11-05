 @extends('admin_folder/index')
         @section('content')

         <?php
use App\page;

if(isset($edit)){

	  $page =  page::find($id);

}

?>


          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Add Pages</h3>
              </div>
              <div class="panel-body">

               <a   class="btn btn-primary" href="/pages">  pages List     </a>


                <form  method="post" action="@if(isset($page)) /pages/{{ $page->id }}  @else /pages @endif"    enctype="multipart/form-data"  >

                  {{ csrf_field() }}

                  <div class="form-group">
                    <label>Page Title</label>
                    <input required  type="text" class="form-control" placeholder="page Title" value="@if(isset($page)) {{$page->title}} @endif"   name="title" >
                  </div>
                  <div class="form-group">




                   @include('admin_folder/tools')



                    <label>Page Body</label>



                    <div   style="height: 300px ; overflow: auto"  onDblClick="$('.tool_container').hide(500)"   onClick="$('.tool_container').show(500)" id="el"  contenteditable="true"     class="form-control  preview"> @if(isset($id)) {!! $page->body !!} @endif </div>









                    <textarea   name="message"    style="display: none"   id="tex">  </textarea>
                  </div>


                  <br/>
                  <br/>
                  <br/>
                  <br/>


                  <div    id="preview" style="" >        </div>

                  <div class="form-group">







                   <input  id="pre_input"     type="hidden"   name="image"    />


                    <label  class="btn btn-primary"  for="file-input">Upload Featured  Image</label>



                    <input       type="file"   style="display: none"   id="file-input"   name="picture" >




                  <div class="checkbox">

                    <?php  if(isset($page)) { ?>

                    <label>

                      <input  name="publish"   value="yes"  @if($page->publish  =='yes')  checked @endif  type="checkbox"> Published
                    </label>


                     <?php   } else{   ?>

                    <label><input  name="publish"   value="yes"    type="checkbox" checked> Published</label>

                    <?php   } ?>
                  </div>

                   <input       type="file"   style="display: none"    id="file-article"    class="file-article" >
                  </div>









                       <?php  if(isset($page)) { ?>

                              <input    type="hidden"     name="_method"   value="PUT"/>





		<input   onClick="acceptm('el' , 'tex');acceptm('topic_div' , 'topic_text')"  onMouseOver="acceptm('el' , 'tex');acceptm('topic_div' , 'topic_text')"  class="btn btn-success"  type="Submit"  value="Update"  />


                       <?php  }else{    ?>






		<input   onClick="acceptm('el' , 'tex');acceptm('topic_div' , 'topic_text')"  onMouseOver="acceptm('el' , 'tex');acceptm('topic_div' , 'topic_text')"  class="btn btn-success"  type="Submit"  value="Submit"  />




                  <input type="reset" class="btn btn-danger" value="Reset"    onClick="$('#preview').hide()">


                  <?php    } ?>

                </form>
              </div>
              </div>

          </div>
       @endsection

