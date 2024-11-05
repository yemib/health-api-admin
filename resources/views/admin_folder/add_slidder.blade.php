 @extends('admin_folder/index')
         @section('content')

         <?php
use App\slidder;

if(isset($edit)){

	  $slidder =  slidder::find($id);

}

?>


          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Add slidder</h3>
              </div>
              <div class="panel-body">

               <a   class="btn btn-primary" href="/slidder">  slidder List     </a>

               <br/>
               <br/>
               <br/>
                <form  method="post" action="@if(isset($slidder)) /slidder/{{ $slidder->id }}  @else /slidder @endif"  enctype="multipart/form-data"   >

                  {{ csrf_field() }}







                  <div class="form-group">

                   <div   id="preview" @if(isset($slidder)) style="background-image: url({{ $slidder->image }}); height: 200px"  @endif >       </div>




                      <div class="form-group">
                    <label>Big text</label>
                    <input  name="text1" class="form-control"     placeholder="Big text"  value="@if(isset($slidder)) {{ $slidder->text1  }}  @endif"  />


                  </div>

                             <div class="form-group">
                    <label>Small text</label>
                    <input   name="text2" class="form-control"     placeholder="Small text"  value="@if(isset($slidder)) {{ $slidder->text2  }}  @endif"  />


                  </div>

                   <input  id="pre_input"     type="hidden"   name="image"    />




                    <label  class="btn btn-primary"  for="file-input">Upload  Slidder Image</label>



                  <div class="checkbox">

                    <?php  if(isset($slidder)) { ?>

                    <label>

                      <input  name="publish"   value="yes"  @if($slidder->publish  =='yes')  checked @endif  type="checkbox"> Published
                    </label>


                     <?php   } else{   ?>

                    <label><input  name="publish"   value="yes"    type="checkbox" checked> Published</label>

                    <?php   } ?>
                  </div>

                   <input     type="file"   style="display: none"   id="file-input"   name="picture" >
                  </div>


                       <?php  if(isset($slidder)) { ?>

                              <input    type="hidden"     name="_method"   value="PUT"/>

                               <input type="submit" class="btn btn-default" value="Update">




                       <?php  }else{    ?>

                  <input type="submit" class="btn btn-default" value="Submit">


                  <input type="reset" class="btn btn-danger" value="Reset"    onClick="$('#preview').hide()">


                  <?php    } ?>

                </form>
              </div>
              </div>

          </div>
       @endsection

