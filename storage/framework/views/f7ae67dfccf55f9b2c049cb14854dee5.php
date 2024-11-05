 
         <?php $__env->startSection('content'); ?>

         <?php
use App\slidder;

if(isset($edit)){

	  $slidder =  slidder::find($id);

}

?>


          <div class="col-md-9">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Add slidder</h3>
              </div>
              <div class="panel-body">

               <a   class="btn btn-primary" href="/slidder">  slidder List     </a>

               <br/>
               <br/>
               <br/>
                <form  method="post" action="<?php if(isset($slidder)): ?> /slidder/<?php echo e($slidder->id); ?>  <?php else: ?> /slidder <?php endif; ?>"  enctype="multipart/form-data"   >

                  <?php echo e(csrf_field()); ?>








                  <div class="form-group">

                   <div   id="preview" <?php if(isset($slidder)): ?> style="background-image: url(<?php echo e($slidder->image); ?>); height: 200px"  <?php endif; ?> >       </div>




                      <div class="form-group">
                    <label>Big text</label>
                    <input  name="text1" class="form-control"     placeholder="Big text"  value="<?php if(isset($slidder)): ?> <?php echo e($slidder->text1); ?>  <?php endif; ?>"  />


                  </div>

                             <div class="form-group">
                    <label>Small text</label>
                    <input   name="text2" class="form-control"     placeholder="Small text"  value="<?php if(isset($slidder)): ?> <?php echo e($slidder->text2); ?>  <?php endif; ?>"  />


                  </div>

                   <input  id="pre_input"     type="hidden"   name="image"    />




                    <label  class="btn btn-primary"  for="file-input">Upload  Slidder Image</label>



                  <div class="checkbox">

                    <?php  if(isset($slidder)) { ?>

                    <label>

                      <input  name="publish"   value="yes"  <?php if($slidder->publish  =='yes'): ?>  checked <?php endif; ?>  type="checkbox"> Published
                    </label>


                     <?php   } else{   ?>

                    <label><input  name="publish"   value="yes"    type="checkbox" checked> Published</label>

                    <?php   } ?>
                  </div>

                   <input     type="file"   style="display: none"   id="file-input"   name="picture" >
                  </div>


                       <?php  if(isset($slidder)) { ?>

                              <input    type="hidden"     name="_method"   value="PUT"/>

                               <input type="submit" class="btn btn-default" value="Update">




                       <?php  }else{    ?>

                  <input type="submit" class="btn btn-default" value="Submit">


                  <input type="reset" class="btn btn-danger" value="Reset"    onClick="$('#preview').hide()">


                  <?php    } ?>

                </form>
              </div>
              </div>

          </div>
       <?php $__env->stopSection(); ?>


<?php echo $__env->make('admin_folder/index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\website\health\health-api-admin\resources\views/admin_folder/add_slidder.blade.php ENDPATH**/ ?>