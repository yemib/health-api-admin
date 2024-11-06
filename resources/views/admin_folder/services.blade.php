
         @extends('admin_folder/index')
@section('content')



          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">  Blog </h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">



                         <a  href="/newsletters/create"   class="btn btn-primary"  > Add Blog  </a>

                      </div>
                </div>
                <br>

                <table class="table table-striped table-hover">
                      <tr>
                        <th>Title</th>
                  {{--       <th>Body</th> --}}
                         <th>Featured Image </th>
                        <th>Published</th>

                        <th></th>
                        <th></th>
                      </tr>


                      <?php   foreach( $service as $newsletters){   ?>

                      <tr  id="each{{$newsletters->id}}">
                        <td> {{ $newsletters->title }}</td>


                      {{--   <td style=""> <div   style="height: 80px  ; overflow: auto ; background: #FF84C1">  {!! $newsletters->body !!} </div>  </td> --}}


                        <td> @if($newsletters->image !='  ') <img  height="50"   width="50"   src="{{ $newsletters->image }}"   />  @endif     </td>


                        <td>
                        <?php   if($newsletters->publish =='yes') {  ?>
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        <?php  } else{  ?>

                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                      <?php  } ?>

                        </td>


                        <td><a class="btn btn-default" href="newsletters/{{  $newsletters->id }}/edit">Edit</a>  </td>

                        <td>
                        <form  id="form_id{{$newsletters->id}}"  onSubmit="send_landing_page(event,'newsletters/{{ $newsletters->id }}', 'form_id{{$newsletters->id}}','each{{$newsletters->id}}','loadingt{{ $newsletters->id }}')"  method="post"  action="newsletters/{{ $newsletters->id }}"   style="display: inline">

                          {{ csrf_field() }}


          <input    name="_method"    value="delete"   type="hidden" />



                          <input  id="loadingt{{ $newsletters->id }}"  type="submit"   class="btn btn-danger"  value="Delete"   />






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






