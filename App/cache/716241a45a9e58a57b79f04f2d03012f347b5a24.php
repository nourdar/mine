<?php $__env->startSection('content'); ?>


<table class="ui olive table skills-form">
    <form action="<?php echo e(url('Admin/EditMe/Skills/IsShow')); ?>" method="post" class="ui form ">
        <thead>
            <tr>
                <th>id</th>
                <th>Created at</th>
                <th data-help="if it status is on it will be 1 ">Status</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <?php if(!empty($skills) && is_array($skills)): ?>
        <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <?php if($skill['id'] == $last): ?>
                        <div class="ui ribbon label">Last Item</div>
                    <?php endif; ?>
                    <?php echo e($skill['id']); ?>

                </td>
                <td><?php echo e($skill['created_at']); ?></td>
                <td>
                    <?php if($skill['is_show'] === 1): ?>
                        <div class="ui checkbox toggle">
                            <input type="checkbox"  checked name="<?php echo e($skill['id']); ?>" value="<?php echo e($skill['id']); ?>"/>
                        </div>
                        <?php else: ?>
                            <div class="ui checkbox toggle">
                                <input type="checkbox"  name="<?php echo e($skill['id']); ?>" value="<?php echo e($skill['id']); ?>" />
                            </div>
                        <?php endif; ?>
                </td>
                <td><a href="#" class="showSkill" data-id="<?php echo e($skill['id']); ?>"><i class="fa fa-eye fa-2x"></i></a></td>
                <td><a href="<?php echo e(url('Admin/EditMe/Skills/Edit/'.$skill['id'])); ?>"><i class="fa fa-pen-square fa-2x"></i></a></td>
                <td><a href="<?php echo e(url('Admin/EditMe/Skills/Delete/'.$skill['id'])); ?>"><i class="fa fa-trash fa-2x"></i></a></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td colspan="6"><input type="submit" class="ui fluid blue button" value="change Selected Block"></td>
        </tr>
        <?php else: ?>
            <tr class="error"><td colspan="6">There is No Block To Show you can add new block by
                    <a href="<?php echo e(url('Admin/EditMe/Skills/Add')); ?>">clicking here</a>
                </td></tr>
        <?php endif; ?>
        </tbody>
    </form>
</table>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('right-bar'); ?>
    <?php if(isset($moreThenOneSelected)): ?>
    <div class="ui message warning">
        <div class="header">oops There is a probleme it maybe : </div>
        <p>
            - All blocks Are Disabled<br>
            - There is More Then One Block Selected <br>
            - There is no Block Check Your Table<br>
        </p>
    </div>
    <?php endif; ?>

    <?php if($selected['status'] === true): ?>
        <h4>preview for selected block : </h4>
    <?php endif; ?>

    <div class="skills-preview">
        <pre>
            <code class="language-php" id="skill-preview">
                 <?php if($selected['status'] === true): ?>
                <?php echo e($selected['text']); ?>

                <?php endif; ?>
            </code>
        </pre>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>