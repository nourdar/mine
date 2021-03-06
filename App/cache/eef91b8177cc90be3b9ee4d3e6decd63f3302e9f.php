<?php $__env->startSection('content'); ?>

    <form action="Admin/EditMe/Skills/update" method="post" class="ui form">
        <input type="hidden" name="id" value="<?php echo e($skills['id']); ?>">
        <div class=" fields">
            <div class="sixteen wide field">
                <h4> My Skills : </h4>
                <textarea name="skills" id="skillsTextarea" >
                     <?php echo e($skills['text']); ?>

                </textarea>
                <input type="submit" class="ui fluid blue button" value="Update This Block">
            </div>
        </div>
    </form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('right-bar'); ?>
    <h4>preview : </h4>
    <div class="skills-preview">
        <pre>
            <code class="language-php" id="skillsPreview">
                <?php echo e($skills['text']); ?>

            </code>
        </pre>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>