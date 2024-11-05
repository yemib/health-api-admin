         
<?php $__env->startSection('content'); ?>

         <?php
use App\page;


$page = page::get();

?>

          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Pages</h3>
              </div>
              <div class="panel-body">
                <div class="row">
                      <div class="col-md-12">



                         <a  href="/pages/create"   class="btn btn-primary"  >  Add Page  </a>

                      </div>
                </div>
                <br>

                <table class="table table-striped table-hover">
                      <tr>
                        <th>Title</th>
                        <th></th>



                        <th>Published</th>

                        <th></th>
                        <th></th>
                        <th>id</th>
                      </tr>


                      <?php   foreach( $page as $pages){   ?>

                      <tr  id="each<?php echo e($pages->id); ?>">
                        <td> <?php echo e($pages->title); ?></td>


                        <td style="">  <a  target="new"  href="/page/<?php echo e($pages->id); ?>/<?php echo e($pages->title); ?>" class="btn btn-default">   View </a>   </td>


                        <td>
                        <?php   if($pages->publish =='yes') {  ?>
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                        <?php  } else{  ?>

                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                      <?php  } ?>

                        </td>


                        <td><a class="btn btn-default" href="pages/<?php echo e($pages->id); ?>/edit">Edit</a>  </td>

                        <td>
                         
                        <form  id="form_id<?php echo e($pages->id); ?>"  onSubmit="send_landing_page(event,'pages/<?php echo e($pages->id); ?>', 'form_id<?php echo e($pages->id); ?>','each<?php echo e($pages->id); ?>','loadingt<?php echo e($pages->id); ?>')"  method="post"  action="pages/<?php echo e($pages->id); ?>"   style="display: inline">

                          <?php echo e(csrf_field()); ?>



          <input    name="_method"    value="delete"   type="hidden" />



                          <input  id="loadingt<?php echo e($pages->id); ?>"  type="submit"   class="btn btn-danger"  value="Delete"   />






                             </form> 
                             


                          
                          </td>
                          <td> <?php echo e($pages->id); ?>   </td>
                      </tr>

                    <?php    } ?>

                    </table>
              </div>
              </div>

          </div>


<?php $__env->stopSection(); ?>







<?php echo $__env->make('admin_folder/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\website\health\health-api-admin\resources\views/admin_folder/pages.blade.php ENDPATH**/ ?>