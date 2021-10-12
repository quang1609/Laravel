
<?php $__env->startSection('content'); ?>
    <form action="" method="get">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Tên item:</label>
                    <input type="text" name="keyword" class="form-control">
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <button class="btn btn-sm btn-primary" type="submit">Tìm kiếm</button>
            </div>
        </div>
    </form>
    <table class="table">
        <thread>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>User ID</th>
                <th>Category ID</th>
                <th>Xóa</th>
                <th>Sửa</th>
            </tr>
        </thread>
        <tbody>
            <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $it): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($it->id); ?></td>
                    <td><?php echo e($it->name); ?></td>
                    <td><?php echo e($it->quantity); ?></td>
                    <td><?php echo e($it->user_id); ?></td>
                    <td><?php echo e($it->category_id); ?></td>
                    <td><a class="btn btn-primary btn-sm" href="/admin/item/destroy/<?php echo e($it->id); ?>"><i class="far fa-trash-alt"></i></a></td>
                    <td><a class="btn btn-primary btn-sm" href="/admin/item/edit/<?php echo e($it->id); ?>"><i class="fas fa-edit"></i></a></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-6 offset-3 d-flex justify-content-center">
            <?php echo e($item->onEachSide(5)->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/Items/list.blade.php ENDPATH**/ ?>