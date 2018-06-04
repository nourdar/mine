<?php echo $__env->make('header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('Admin.navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="ui stackable grid">
    <div class="ten wide column">
        <div class="ui relaxed gird">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    <div class="six wide column">
        <div class="ui relaxed gird">
            <?php echo $__env->yieldContent('right-bar'); ?>
        </div>
    </div>
</div>

<?php echo $__env->make('Admin.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>