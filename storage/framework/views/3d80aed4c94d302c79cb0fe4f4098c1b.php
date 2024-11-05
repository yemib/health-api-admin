

<?php $__env->startSection('content'); ?>



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
                     
                        <th>Published</th>

                        <th></th>
                        <th></th>
                      </tr>


                      <?php   foreach( $service as $testimony){   ?>

                      <tr  id="each<?php echo e($testimony->id); ?>">
                        <td> <?php echo e($testimony->title); ?></td>


                        <td style=""> <div   style="height: 80px  ; overflow: auto ; background: white; padding:5px">  <?php echo $testimony->body; ?> </div>  </td> 



                        <td>
                        <?php   if($testimony->publish =='yes') {  ?>
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        <?php  } else{  ?>

                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                      <?php  } ?>

                        </td>


                        <td><a class="btn btn-default" href="testimony/<?php echo e($testimony->id); ?>/edit">Edit</a>  </td>

                        <td>
                        <form  id="form_id<?php echo e($testimony->id); ?>"  onSubmit="send_landing_page(event,'testimony/<?php echo e($testimony->id); ?>', 'form_id<?php echo e($testimony->id); ?>','each<?php echo e($testimony->id); ?>','loadingt<?php echo e($testimony->id); ?>')"  method="post"  action="testimony/<?php echo e($testimony->id); ?>"   style="display: inline">

                          <?php echo e(csrf_field()); ?>



          <input    name="_method"    value="delete"   type="hidden" />



                          <input  id="loadingt<?php echo e($testimony->id); ?>"  type="submit"   class="btn btn-danger"  value="Delete"   />






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







<?php echo $__env->make('admin_folder/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\website\health\health-api-admin\resources\views/admin_folder/testimonies.blade.php ENDPATH**/ ?>