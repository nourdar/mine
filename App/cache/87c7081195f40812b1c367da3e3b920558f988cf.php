<?php $__env->startSection('content'); ?>

    <div class="container">

        <?php if(!empty($tweets) && is_array($tweets)): ?>

            <?php $__currentLoopData = $tweets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tweet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="ui raised <?php if($tweet['is_show'] == 1): ?> blue <?php else: ?> red <?php endif; ?> segment">
                    <div class="ui inline absolute right dropdown ">
                        <div class="text blue"><i class="fa fa-edit"></i> Edit </div>

                        <div class="menu">
                            <div class="item" >Edit</div>
                            <div class="item" >Delete</div>
                            <div class="item" >
                                <?php if($tweet['is_show'] == 1): ?>
                                    <a href="#" data-value="0" class="black">Hide</a>
                                <?php else: ?>
                                    <a href="#" data-value="1" class="black">Show</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="ui comments">
                        <div class="comment">
                            <a class="avatar">
                                <img src="<?php echo e($tweet['image']); ?>" width="50" height="50">
                            </a>
                            <div class="content">
                                    <a class="author"><?php echo e($tweet['email']); ?></a>
                                <div class="metadata">
                                    <span class="date"><?php echo e($tweet['created_at']); ?></span>
                                </div>
                                <div class="text ">
                                    <div class="p-l-10"><?php echo $tweet['text'] ?></div>
                                </div>
                                <div class="actions">
                                    <a class="reply">Like</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <br>
                    <?php if(isset($tweet['comments']) && !empty($tweet['comments'])): ?>
                        <div class="ui horizontal divider">
                            Comments
                        </div>
                            <?php $__currentLoopData = $tweet['comments']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="ui comments">
                                    <div class="comment">

                                        <div class="ui inline absolute right dropdown">
                                            <div class="text"><i class="fa blue fa-arrow-circle-down"></i></div>
                                            <div class="menu">
                                                <div class="item" >Edit</div>
                                                <div class="item" >Delete</div>
                                            </div>
                                        </div>
                                        <a class="avatar">
                                            <img src="<?php echo e(icon($comment['image'], "Users")); ?>">
                                        </a>
                                        <div class="content">
                                            <a class="author"><?php echo e($comment['email']); ?></a>
                                            <div class="metadata">
                                                <span class="date"><?php echo e($comment['created_at']); ?></span>
                                            </div>
                                            <div class="text ">
                                                <?php echo e($comment['text']); ?>

                                            </div>
                                            <div class="actions">
                                                <a class="reply">Like</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                    <div class="ui horizontal divider">
                        Add Comment
                    </div>
                        <form class="ui reply form" method="post" action="<?php echo e(url("Admin/Tweets/PostComment")); ?>">
                            <input type="hidden" name="tweet_id" value="<?php echo e($tweet['id']); ?>"/>
                            <div class="field">
                                <textarea name="text"><?php echo e(old('comment')); ?></textarea>
                            </div>
                            <button type="submit" class="ui blue button">
                                <i class="fa fa-edit"></i> Add Comment
                            </button>
                        </form>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <button class="ui fluid blue button"><a href="<?php echo e($currentPage); ?>">Show More Tweets</a></button>
        <?php else: ?>
            <div class="ui error message">
                <div class="header">Ooops Tweets Table is empty</div>
                <div class="content">There is No Tweet To Show</div>
            </div>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('right-bar'); ?>
    <?php if(isset($noTweet)): ?>
        <div class="ui message warning">
            <div class="header">oops There is No Tweet To Shwo : </div>
            <p>
                - PLease Add Tweet<br>
                - Tweeting is amusing Try It It's Free <br>
            </p>
        </div>
    <?php endif; ?>
    <div class="three column row">
        <div class="column"><h2>hello There thats test tttttttt</h2></div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>