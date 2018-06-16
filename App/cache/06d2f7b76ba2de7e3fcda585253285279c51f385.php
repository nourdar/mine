<?php $__env->startSection('content'); ?>


    <table class="ui olive table skills-form">
            <thead>
            <tr>
                <th>id</th>
                <th>E-mail</th>
                <th>Country</th>
                <th>Created at</th>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($results) && is_array($results)): ?>
                <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td>
                            <?php echo e($result['id']); ?>

                        </td>
                        <td>
                            <?php echo e($result['email']); ?>

                        </td>
                        <td>
                            <img class="flag flag-<?php echo e(getCountry($result['ip'])['CODE']); ?>" />
                            <?php echo e(getCountry($result['ip'])['NAME']); ?>

                        </td>
                        <td><?php echo e(date("Y-m-D h:i",$result['created_at'])); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan="6" class="center aligned"><?php echo e(paginate(url('Admin/NewsLetter'),$pages,$currentPage,$limit)); ?></td>
                </tr>
            <?php else: ?>
                <tr class="error">
                    <td colspan="6">There is No News Letter Yet</td></tr>
            <?php endif; ?>
            </tbody>
    </table>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('right-bar'); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>