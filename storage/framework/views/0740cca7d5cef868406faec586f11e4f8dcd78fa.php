<?php $__env->startSection('content'); ?>

      <div class="row">
            <div class="col-lg-12">
                  <form class="form-inline" action="/create/todo" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                              <input type="text" class="form-control input-lg" name="todo" placeholder="Todo item">
                        </div>
                        <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd">
                              <input class="form-control" name="deadline" type="text" readonly />
                              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Todo</button>

                  </form>
            </div>
      </div>
      <hr>

      <?php $__currentLoopData = $todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($todo->todo); ?> <a href="<?php echo e(route('todo.delete', ['id' => $todo->id])); ?>" class="btn btn-danger"> x </a>

            <?php

            $expired = false;
            $date_now = date("Y-m-d");
            if ($date_now > $todo->deadline) {
                $expired = true;
            }
            if($expired) {
            ?>
                  <span class="text-success">Expired!</span>
                  <a href="<?php echo e(route('todo.update', ['id' => $todo->id])); ?>" class="btn btn-info btn-xs"> Re open </a>
            <?php
            } else if(!$todo->completed) {
            ?>
                  <a href="<?php echo e(route('todos.completed', [ 'id' => $todo->id ])); ?>" class="btn btn-xs btn-success"> Mark as completed</a>
            <?php
            } else {
            ?>
                <span class="text-success">Completed!</span>
            <?php
            }
            ?>


            <?php echo e($todo->deadline); ?>

            <hr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>