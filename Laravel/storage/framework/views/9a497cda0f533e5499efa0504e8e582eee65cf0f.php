;

<?php $__env->startSection('content'); ?>
<h1>PRODUCT TABLE</h1>
<table class="table table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Detail</th>
      <th scope="col">Image</th>
    </tr>
    <?php
    	$id = 1;
    ?>

    <?php echo e($id); ?>


</table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp64\www\CRUD\resources\views/home.blade.php ENDPATH**/ ?>