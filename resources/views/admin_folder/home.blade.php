 @extends('admin_folder/index')
         @section('content')

         <?php

 use App\admins;
 use App\slidders;
 use App\page;



$admins  = admins::get();

$slidders  = slidders::get();
$pages  = page::get();

?>

          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Website Overview</h3>
              </div>
              <div class="panel-body">

                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span>{{  count($admins) }}</h2>
                    <h4>Users</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> {{  count($pages) }}</h2>
                    <h4>Pages</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>{{  count($slidders) }}</h2>
                    <h4>Banners</h4>
                  </div>
                </div>
            

              {{--   <div class="col-md-12">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>Update From FaceBook</h2>
                    <h4><a  target="_blank" class="btn btn-success" href="/getpostnow">   UPDATE </a></h4>
                  </div>
                </div> --}}

             

              </div>
              </div>

              <!-- Latest Users -->
    {{--           <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Admin Details</h3>
                </div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                      <tr>
                        <th>Username</th>
                        <th>Password</th>

                      </tr>

                      <?php    //foreach($admins  as $admins  )   {?>
                      <tr>
                        <td>{{   $admins->username }}</td>
                        <td>  {{   $admins->password }}</td>


                      </tr>


                    <?php // } ?>
					</table>
                </div>
              </div>
          </div> --}}


          @endsection

