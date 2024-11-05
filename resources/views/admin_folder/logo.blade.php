 @extends('admin_folder/index')
         @section('content')

         <?php
use App\logos;

$alllogo  =   logos::first();


 $logo =  logos::first();



?>


          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Update logo</h3>
              </div>
              <div class="panel-body">

                <form  method="post" action="@if(isset($logo)) /logo/{{ $logo->id }}  @else /logo @endif"   enctype="multipart/form-data"  >

                  {{ csrf_field() }}



                  <div class="form-group">

                   <div   id="preview"  style="background-image: url({{ $alllogo->image }}); height: 200px"  >       </div>


                   <input  id="pre_input"     type="hidden"   name="image"    />


                    <label  class="btn btn-primary"  for="file-input">Upload  logo Image</label>




                   <input     type="file"  required style="display: none"   id="file-input"   name="picture">
                  </div>


                       <?php  if(isset($logo)) { ?>

                              <input    type="hidden"     name="_method"   value="PUT"/>

                               <input   type="submit" class="btn btn-default" value="Update">




                       <?php  }else{    ?>

                  <input type="submit" class="btn btn-default" value="Submit">




                  <?php    } ?>

                </form>
              </div>
              </div>

          </div>
       @endsection

