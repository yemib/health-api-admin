
         @extends('admin_folder/index')
@section('content')

         <?php
use App\board;


$staff = board::get();

?>

          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Board</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">



                         <a  href="/board/create"   class="btn btn-primary"  >  Add to Board  </a>

                      </div>
                </div>
                <br>

                <table class="table table-striped table-hover">
                      <tr>
                        <th>name</th>
                        <th>position</th>
                         <th>Image </th>


                        <th>Published</th>

                        <th></th>
                        <th></th>
                      </tr>


                      <?php   foreach( $staff as $staffs){   ?>

                      <tr  id="each{{$staffs->id}}">
                        <td> {{ $staffs->name }}</td>


                        <td style=""> <div   style="height: 80px  ; overflow: auto ; background: #FF84C1">  {!! $staffs->position !!} </div>  </td>


                        <td> @if($staffs->image !='  ') <img  height="50"   width="50"   src="{{ $staffs->image }}"   />  @endif     </td>





                        <td>
                        <?php   if($staffs->publish =='yes') {  ?>
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        <?php  } else{  ?>

                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                      <?php  } ?>

                        </td>


                        <td><a class="btn btn-default" href="board/{{  $staffs->id }}/edit">Edit</a>  </td>

                        <td>

                        <form  id="form_id{{$staffs->id}}"  onSubmit="send_landing_page(event,'board/{{ $staffs->id }}', 'form_id{{$staffs->id}}','each{{$staffs->id}}','loadingt{{ $staffs->id }}')"  method="post"  action="board/{{ $staffs->id }}"   style="display: inline">

                          {{ csrf_field() }}


                       <input    name="_method"    value="delete"   type="hidden" />



                          <input  id="loadingt{{ $staffs->id }}"  type="submit"   class="btn btn-danger"  value="Delete"   />






                             </form>



                          </td>
                      </tr>

                    <?php    } ?>

                    </table>
              </div>
              </div>

          </div>


@endsection






