

<?php $__env->startSection('content'); ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>


<?php
  $yes_checked = $no_checked = "";
  ($product->is_fragile)? $yes_checked = "checked=checked": $no_checked = "checked=checked"; 
?>

<form action="<?php echo e(route('products.update',$id)); ?>" method = "post" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
<?php echo method_field('PUT'); ?>
  <div class="mb-3">
    <label for="title" class="form-label">Name of Product:</label>
    <input type="text" class="form-control" id="title" name = "title" value="<?php echo e($product->title); ?>">
  </div>
  <div class="mb-3">
    <label for="detail" class="form-label">Product Details</label>
    <input type="text" class="form-control" id="detail" name = "details" value = "<?php echo e($product->details); ?>">
  </div>
  <div class = "mb-3">
    <strong>Is the product fragile&nbsp;&nbsp;</strong>

    <input type="radio" id="yes" name="is_fragile" value="YES" <?php echo e($yes_checked); ?>>
    <label for="yes">Yes</label>
    <input type="radio" id="no" name="is_fragile" value="NO" <?php echo e($no_checked); ?>>
    <label for="no">No</label>
  </div>

  <div class="mb-3">
    <label for="img" class="form-label">Upload an image</label>
    <input type="file" name="image" id = "img">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp64\www\CRUD\resources\views/edit.blade.php ENDPATH**/ ?>