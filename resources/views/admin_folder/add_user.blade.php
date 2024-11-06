 @extends('admin_folder/index')
         @section('content')

         <?php
use App\admins;

if(isset($edit)){

	  $users =  admins::find($id);

}

?>


          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Add users</h3>
              </div>
              <div class="panel-body">

               <a   class="btn btn-primary" href="/users">  users List     </a>
                <form  method="post" action="@if(isset($users)) /users/{{ $users->id }}  @else /users @endif"   >

                  {{ csrf_field() }}

                  <div class="form-group">
                    <label>Username</label>
                    <input   type="text" class="form-control" placeholder="Username" value="@if(isset($users)){{$users->username}}@endif"   name="username" >
                  </div>
                  <div class="form-group">


                    <label>Password</label>


		 <input   type="password" class="form-control" placeholder="Password" value="@if(isset($users)){{$users->password}}@endif"   name="password" >
       <br/>


                       <?php  if(isset($users)) { ?>

                              <input    type="hidden"     name="_method"   value="PUT"/>





		<input     class="btn btn-success"  type="Submit"  value="Update"  />


                       <?php  }else{    ?>


	<input     class="btn btn-success"  type="Submit"  value="Submit"  />


      <input type="reset" class="btn btn-danger" value="Reset"  >


                  <?php    } ?>

                </form>
              </div>
              </div>

          </div>
       @endsection

