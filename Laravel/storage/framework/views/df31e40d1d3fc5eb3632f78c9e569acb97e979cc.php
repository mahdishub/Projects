

<?php $__env->startSection('content'); ?>
<h2>PRODUCT TABLE</h2>
<table class="table table-dark">
    <tr>
      <th>SL no.</th>
      <th>Image</th>
      <th>Name</th>
      <th>Detail</th>
      <th>Is Fragile</th>
      <th>Location</th>
      <th>Actions</th>
    </tr>
    <?php
    	$i=1;
        $image_name = 'default.png';
    ?>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
    	<td><?php echo e($i++); ?></td>


        <?php
            if ( $product->image != null) { $image_name = $product->image; }
        ?>

        <td><img src = "<?php echo e(asset('storage/images/'.$image_name)); ?>" alt="<?php echo e($image_name); ?>" width="100px" height="100px"></td>
    	<td><?php echo e($product->title); ?></td>
    	<td><?php echo e($product->details); ?></td>
        <td>
            <?php if( $product->is_fragile == 1 ): ?> Yes
            <?php else: ?> No
            <?php endif; ?>
        </td>
        <td><?php echo e($product->location); ?></td>
    	<td>
    	<form action="<?php echo e(route('products.destroy',$product->id)); ?>" method="POST">
    		<?php echo method_field('DELETE'); ?>
    		<?php echo csrf_field(); ?>
    		<a class="btn btn-primary" href = "<?php echo e(route('products.edit',$product->id)); ?>">Edit</a>
    		<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>

    	</form>
    	</td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<a class= "btn btn-success" href="<?php echo e(route('products.create')); ?>"> Create new entry</a>



<?php $__env->stopSection(); ?>





<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\wamp64\www\CRUD\resources\views/index.blade.php ENDPATH**/ ?>