<?php $__env->startSection('content'); ?>
      <div class="row">
            <div class="col-lg-12">
                  <form action="<?php echo e(route('todos.save', ['id' => $todo->id ])); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <input type="text" class="form-control input-lg" name="todo" value="<?php echo e($todo->todo); ?>" placeholder="Create a new todo">
                  </form>
            </div>
      </div>
      <hr>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>