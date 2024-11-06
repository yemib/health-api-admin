
         
<?php $__env->startSection('content'); ?>



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
                  
                         <th>Featured Image </th>
                        <th>Published</th>

                        <th></th>
                        <th></th>
                      </tr>


                      <?php   foreach( $service as $newsletters){   ?>

                      <tr  id="each<?php echo e($newsletters->id); ?>">
                        <td> <?php echo e($newsletters->title); ?></td>


                      


                        <td> <?php if($newsletters->image !='  '): ?> <img  height="50"   width="50"   src="<?php echo e($newsletters->image); ?>"   />  <?php endif; ?>     </td>


                        <td>
                        <?php   if($newsletters->publish =='yes') {  ?>
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        <?php  } else{  ?>

                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                      <?php  } ?>

                        </td>


                        <td><a class="btn btn-default" href="newsletters/<?php echo e($newsletters->id); ?>/edit">Edit</a>  </td>

                        <td>
                        <form  id="form_id<?php echo e($newsletters->id); ?>"  onSubmit="send_landing_page(event,'newsletters/<?php echo e($newsletters->id); ?>', 'form_id<?php echo e($newsletters->id); ?>','each<?php echo e($newsletters->id); ?>','loadingt<?php echo e($newsletters->id); ?>')"  method="post"  action="newsletters/<?php echo e($newsletters->id); ?>"   style="display: inline">

                          <?php echo e(csrf_field()); ?>



          <input    name="_method"    value="delete"   type="hidden" />



                          <input  id="loadingt<?php echo e($newsletters->id); ?>"  type="submit"   class="btn btn-danger"  value="Delete"   />






                             </form>



                          </td>
                      </tr>

                    <?php    } ?>

                    </table>
              </div>
              </div>
     <?php echo e($service->links()); ?>

          </div>


<?php $__env->stopSection(); ?>







<?php echo $__env->make('admin_folder/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\website\health\health-api-admin\resources\views/admin_folder/services.blade.php ENDPATH**/ ?>