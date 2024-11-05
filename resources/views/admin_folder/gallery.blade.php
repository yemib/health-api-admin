
         @extends('admin_folder/index')
@section('content')

         <?php
use App\gallery;


$slidders = gallery::orderby('created_at'  ,  'desc')->paginate(100);

?>

          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Gallery</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">



                         <a  href="/gallery/create"   class="btn btn-primary"  >  Add Gallery  </a>

                      </div>
                </div>
                <br>

                <table class="table table-striped table-hover">
                      <tr>
                         <th>Image </th>
                         <th>Name </th>
                        <th>Published</th>

                        <th></th>
                        <th></th>
                      </tr>


                      <?php   foreach($slidders as $slidder){   ?>

                      <tr  id="each{{$slidder->id}}">



                        <td> @if($slidder->image !='  ') <img  height="50"   width="50"   src="{{ $slidder->image }}"   />  @endif     </td>

                        <td>    {{  $slidder->text1  }}  </td>


                        <td>
                        <?php   if($slidder->publish =='yes') {  ?>
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        <?php  } else{  ?>

                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                      <?php  } ?>

                        </td>


                        <td><a class="btn btn-default" href="gallery/{{  $slidder->id }}/edit">Edit</a>  </td>

                        <td>
                        <form  id="form_id{{$slidder->id}}"  onSubmit="send_landing_page(event,'gallery/{{ $slidder->id }}', 'form_id{{$slidder->id}}','each{{$slidder->id}}','loadingt{{ $slidder->id }}')"  method="post"  action="gallery/{{ $slidder->id }}"   style="display: inline">

                          {{ csrf_field() }}


          <input    name="_method"    value="delete"   type="hidden" />



                          <input  id="loadingt{{ $slidder->id }}"  type="submit"   class="btn btn-danger"  value="Delete"   />






                             </form>



                          </td>
                      </tr>

                    <?php    } ?>

                    </table>
              </div>
              </div>
   {{  $slidders->links() }}
          </div>


@endsection






