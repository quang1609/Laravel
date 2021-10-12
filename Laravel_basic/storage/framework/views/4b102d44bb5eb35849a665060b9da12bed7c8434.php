
<?php $__env->startSection('content'); ?>
    <form action="" method="POST"> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name" value="<?php echo e($user->name); ?>">
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter email" disabled="" value="<?php echo e($user->email); ?>"> 
                  </div>
                  <div class="form-group">
                    <input type="checkbox" name="change" id="change">
                    <label for="">Password</label>
                    <input type="password" class="form-control password" name="password" id="password" placeholder="Enter password" disabled="">
                  </div>
                 <div class="form-group">
                    <label for="">Password Confirm</label>
                    <input type="password" class="form-control password" name="passwordCf" id="password" placeholder="Enter password confirm" disabled="">
                  </div>
                  <div class="form-group">
                    <label for="">Role</label><br>
                    <label class="radio-inline">
                        <input type="radio" name="rdRole" value="1"
                        <?php echo e($user->role == 1 ? 'checked' :''); ?>  
                        >Admin
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="rdRole" value="2"
                        <?php echo e($user->role == 2 ? 'checked' :''); ?>

                        >User
                    </label>
                    </label>
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              <?php echo csrf_field(); ?>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function ()
        {
            $("#change").change(function ()
            {
                if($(this).is(":checked")) {
                    $(".password").removeAttr('disabled');
                } else {
                    $(".password").attr('disabled','');
                }
            }
            );
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/admin/users/change.blade.php ENDPATH**/ ?>