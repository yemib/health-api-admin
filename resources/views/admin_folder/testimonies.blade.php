
@extends('admin_folder/index')
@section('content')



          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title"> Testimonies</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">



                         <a  href="/testimony/create"   class="btn btn-primary"  >  Add Testimony  </a>

                      </div>
                </div>
                <br>

                <table class="table table-striped table-hover">
                      <tr>
                        <th>Title</th>
                     <th>Body</th> 
                     {{--     <th>Featured Image </th> --}}
                        <th>Published</th>

                        <th></th>
                        <th></th>
                      </tr>


                      <?php   foreach( $service as $testimony){   ?>

                      <tr  id="each{{$testimony->id}}">
                        <td> {{ $testimony->title }}</td>


                        <td style=""> <div   style="height: 80px  ; overflow: auto ; background: white; padding:5px">  {!! $testimony->body !!} </div>  </td> 

{{-- 
                        <td> @if($testimony->image !='  ') <img  height="50"   width="50"   src="{{ $testimony->image }}"   />  @endif     </td>
 --}}

                        <td>
                        <?php   if($testimony->publish =='yes') {  ?>
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        <?php  } else{  ?>

                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                      <?php  } ?>

                        </td>


                        <td><a class="btn btn-default" href="testimony/{{  $testimony->id }}/edit">Edit</a>  </td>

                        <td>
                        <form  id="form_id{{$testimony->id}}"  onSubmit="send_landing_page(event,'testimony/{{ $testimony->id }}', 'form_id{{$testimony->id}}','each{{$testimony->id}}','loadingt{{ $testimony->id }}')"  method="post"  action="testimony/{{ $testimony->id }}"   style="display: inline">

                          {{ csrf_field() }}


          <input    name="_method"    value="delete"   type="hidden" />



                          <input  id="loadingt{{ $testimony->id }}"  type="submit"   class="btn btn-danger"  value="Delete"   />






                             </form>



                          </td>
                      </tr>

                    <?php    } ?>

                    </table>
              </div>
              </div>
     {{  $service->links()  }}
          </div>


@endsection






