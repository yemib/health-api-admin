
         @extends('admin_folder/index')
@section('content')

         <?php
use App\admins;


$users = admins::get();

?>

          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">admins</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">



                         <a  href="/users/create"   class="btn btn-primary"  >  Add users  </a>

                      </div>
                </div>
                <br>

                <table class="table table-striped table-hover">
                      <tr>

                        <th>Username</th>
                        {{-- <th>Password</th> --}}

                        <th></th>
                        <th></th>
                      </tr>


                      <?php   foreach( $users as $users){   ?>

                      <tr  id="each{{$users->id}}">




                        <td> {{$users->username }} </td>
                       {{--  <td>{{ $users->password }}  </td> --}}


                        <td><a class="btn btn-default" href="users/{{  $users->id }}/edit">Edit</a>  </td>

                        <td>
                        <form  id="form_id{{$users->id}}"  onSubmit="send_landing_page(event,'users/{{ $users->id }}', 'form_id{{$users->id}}','each{{$users->id}}','loadingt{{ $users->id }}')"  method="post"  action="users/{{ $users->id }}"   style="display: inline">

                          {{ csrf_field() }}


          <input    name="_method"    value="delete"   type="hidden" />



                          <input  id="loadingt{{ $users->id }}"  type="submit"   class="btn btn-danger"  value="Delete"   />






                             </form>



                          </td>
                      </tr>

                    <?php    } ?>

                    </table>
              </div>
              </div>

          </div>


@endsection






