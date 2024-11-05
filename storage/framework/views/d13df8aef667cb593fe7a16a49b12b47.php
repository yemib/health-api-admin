<!---thhe banner is here  ---->

<?php

use App\page;

$page = page::find($id);

?>


<?php $__env->startSection('title'); ?>
    <?php echo e($page->title); ?>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>



    <header class="jumbotron text-center bg-success text-white py-5">
        <div class="container">
            <h1 class="display-4 mb-4" style="padding-top: 50px;">🌍 <?php echo e($page->title); ?> </h1>
        </div>
    </header>



    <div class="container mt-5"  style="margin-bottom: 50px">
        <!-- Post Title -->
        <h1 class="display-4"> <?php echo e($page->title); ?></h1>

        <!-- Post Body -->
        <p class="lead" style="color: black;">
            <?php echo $page->body; ?>

        </p>

    </div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.index2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\website\health\health-api-admin\resources\views/about.blade.php ENDPATH**/ ?>