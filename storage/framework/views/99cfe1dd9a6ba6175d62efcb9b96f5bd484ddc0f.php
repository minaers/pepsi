<?php $__env->startSection('content'); ?>

    <?php if(\Session::has('success')): ?>
        <div class="alert alert-success">
            <p><?php echo e(\Session::get('success')); ?></p>
        </div><br />
    <?php endif; ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>FirstName</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>phone</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Link</th>
            <th>DJ</th>
            <th>Category</th>
            <th>Pass</th>
            <th>price</th>
            <th>Host</th>


            <th colspan="2">Action</th>
        </tr>
        </thead>
        <tbody>

        <?php $__currentLoopData = $users_event; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($event['id']); ?></td>
                <td><?php echo e($event['fname']); ?></td>
                <td><?php echo e($event['lname']); ?></td>
                <td><?php echo e($event['email']); ?></td>
                <td><?php echo e($event['phone']); ?></td>
                <td><?php echo e($event['gender']); ?></td>
                <td><?php echo e($event['age']); ?></td>
                <td><?php echo e($event['link']); ?></td>
                <td><?php echo e($event['optone']); ?></td>
                <td><?php echo e($event['opttwo']); ?></td>
                <td><?php echo e($event['optthree']); ?></td>
                <td><?php echo e($event['Price']); ?></td>
                <?php if($event['host']=='0'): ?>
                    <td>Hosting <?php echo e(\App\users_event::where('host','=',$event['id'])->count()); ?> Person(s)</td>
                <?php else: ?>
                <td>host ID : <?php echo e($event['host']); ?></td>
                <?php endif; ?>
                <?php if($event['Paid']=='1'): ?>
                    <td>Paid</td>
                <?php else: ?>
                    <td>Didn't Pay Yet</td>
                <?php endif; ?>







                <td><a href="<?php echo e(action('paymentController@edit', $event['id'])); ?>" class="btn btn-success">Send QR</a></td>

                <td>
                    <form action="<?php echo e(action('UsersController@destroy', $event['id'])); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-danger" type="submit">Reject</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>