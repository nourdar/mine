<?php $__env->startSection('content'); ?>
    <form action="Admin/Tweets/PostTweet" method="post" class="ui form">
        <div class=" fields">
            <div class="sixteen wide field">
                <h4> Let's Tweet : </h4>
                <textarea name="tweet" id="skillsTextarea" >
                    <?php echo e(old('tweet')); ?>

                </textarea>
                <input type="submit" class="ui fluid blue button" value="Add Tweet Now ...">
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('right-bar'); ?>
<h4>Latest Tweets: </h4>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>