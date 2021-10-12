
<?php $__env->startSection('content'); ?>
<form action="" method="POST"> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="<?php echo e($item->name); ?>">
                  </div>
                  <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Enter Quantity" value="<?php echo e($item->quantity); ?>">
                  </div>
                  <div class="form-group">
                        <label>User ID</label>
                        <select class="form-control" name="user_id">
                            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->user_id); ?>" <?php echo e($ur->id == $item->user_id ? 'selected' : ''); ?>><?php echo e($ur->id); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                  </div>
                  <div class="form-group">
                    <label>Category ID</label>
                    <select class="form-control" name="category_id">
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                               <option value="<?php echo e($item->category_id); ?>" <?php echo e($ct->id == $item->category_id ? 'selected' : ''); ?>><?php echo e($ct->id); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Edit</button>
                </div>
                <?php echo csrf_field(); ?>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/Items/edit.blade.php ENDPATH**/ ?>