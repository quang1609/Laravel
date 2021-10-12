
<?php $__env->startSection('content'); ?>
<form action="" method="get">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Enter Username:</label>
                    <input type="text" name="keyword" class="form-control">
                    <button class="btn btn-sm btn-primary" type="submit">Tìm kiếm</button>
                </div>
            </div>
        </div>
    </form>
    <table class="table">
        <thread>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
            </tr>
        </thread>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->password); ?></td>
                    <td>
                        <?php if($user->role == 1): ?>
                            <span>Admin</span>
                        <?php else: ?>
                            <span>Người dùng</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div>
    <?php echo $users->links(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/users/list.blade.php ENDPATH**/ ?>