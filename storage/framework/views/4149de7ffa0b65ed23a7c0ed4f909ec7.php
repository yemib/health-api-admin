
         
<?php $__env->startSection('content'); ?>

         <?php
use App\slidder;


$slidders = slidder::orderby('created_at'  ,  'desc')->paginate(100);

?>

          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">slidder</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">



                         <a  href="/slidder/create"   class="btn btn-primary"  >  Add Slidder  </a>

                      </div>
                </div>
                <br>

                <table class="table table-striped table-hover">
                      <tr>
                         <th>Image </th>
                        <th>Published</th>

                        <th></th>
                        <th></th>
                      </tr>


                      <?php   foreach( $slidders as $slidder){   ?>

                      <tr  id="each<?php echo e($slidder->id); ?>">



                        <td> <?php if($slidder->image !='  '): ?> <img  height="50"   width="50"   src="<?php echo e($slidder->image); ?>"   />  <?php endif; ?>     </td>


                        <td>
                        <?php   if($slidder->publish =='yes') {  ?>
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        <?php  } else{  ?>

                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                      <?php  } ?>

                        </td>


                        <td><a class="btn btn-default" href="slidder/<?php echo e($slidder->id); ?>/edit">Edit</a>  </td>

                        <td>
                        <form  id="form_id<?php echo e($slidder->id); ?>"  onSubmit="send_landing_page(event,'slidder/<?php echo e($slidder->id); ?>', 'form_id<?php echo e($slidder->id); ?>','each<?php echo e($slidder->id); ?>','loadingt<?php echo e($slidder->id); ?>')"  method="post"  action="slidder/<?php echo e($slidder->id); ?>"   style="display: inline">

                          <?php echo e(csrf_field()); ?>



          <input    name="_method"    value="delete"   type="hidden" />



                          <input  id="loadingt<?php echo e($slidder->id); ?>"  type="submit"   class="btn btn-danger"  value="Delete"   />






                             </form>



                          </td>
                      </tr>

                    <?php    } ?>

                    </table>
              </div>
              </div>
   <?php echo e($slidders->links()); ?>

          </div>


<?php $__env->stopSection(); ?>







<?php echo $__env->make('admin_folder/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\website\health\health-api-admin\resources\views/admin_folder/slidder.blade.php ENDPATH**/ ?>