<?php $__env->startSection('content'); ?>
<h1>Edit My Personal Informations</h1>
<?php echo e(ses('s_message')); ?>


<form class="ui form" method="post" action="<?php echo e(url('admin/meUpdate')); ?>" enctype="multipart/form-data">
    <div class="field">
        <label>Name</label>
        <div class="two fields">
            <div class="field">
                <input  value=<?php echo e($me->giveMe('name')); ?> name="name">
            </div>
            <div class="field">
                <input value=<?php echo e($me->giveMe('surname')); ?> name="username">
            </div>
        </div>
    </div>

    <div class="field">
        <label>Address</label>
        <div class="fields">
            <div class="twelve wide field">
                <input value="<?php echo e(old('address', $me)); ?>" name="address">
            </div>
        </div>
    </div>
        <div class="four fields">
            <div class="field">
                <label>Birthday : </label>
                <input type="date" value=<?php echo e($me->giveMe('birthday')); ?> name="birthday">
            </div>
            <div class="field">
                <label>E-mail : </label>
                <input value=<?php echo e($me->giveMe('email')); ?> name="email">
            </div>
            <div class="field">
                <label>phone 1 : </label>
                <input value=<?php echo e($me->giveMe('phone1')); ?> name="phone1">
            </div>
            <div class="field">
                <label>phone 2 : </label>
                <input value=<?php echo e($me->giveMe('phone2')); ?> name="phone2">
            </div>
        </div>
    <div class="field">
        <label>job : </label>
        <input value=<?php echo e($me->giveMe('job')); ?> name="job">
    </div>
    <div class="fields">
        <div class="six wide field">
            <label><img src="<?php echo e(image($me->giveMe('image'))); ?>" id="uploadMyImage" class="ui image rounded "/></label>
        </div>
       <div class="eight wide field dropzone">
           
           <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
       </div>
    </div>

    <div class="field">
        <label>Description</label>
        <textarea rows="3" name="description"><?php echo e($me->giveMe('description')); ?></textarea>
    </div>

    <div class="field">
        <label>About</label>
        <textarea name="about" ><?php echo e($me->giveMe('about_me')); ?></textarea>
    </div>

    <input type="submit" value="change settings" class="ui button blue"/>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>