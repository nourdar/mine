<?php $__env->startSection('content'); ?>
<h1 class="ui red header ">Edit My Personal Informations</h1>
<?php echo e(ses('s_message')); ?>



<form class="ui form" method="post" action="<?php echo e(purl('Admin/EditMe/MeUpdate')); ?>" enctype="multipart/form-data">
    <div class="field">
        <label>Name</label>
        <div class="two fields">
            <div class="field">
                <input  value=<?php echo e(old('name', $me)); ?> name="name">
            </div>
            <div class="field">
                <input value=<?php echo e(old('surname', $me)); ?> name="surname">
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
                <input type="date" value=<?php echo e(old('birthday', $me)); ?> name="birthday">
            </div>
            <div class="field">
                <label>E-mail : </label>
                <input value=<?php echo e(old('email', $me)); ?> name="email">
            </div>
            <div class="field">
                <label>phone 1 : </label>
                <input value=<?php echo e(old('phone1', $me)); ?> name="phone1" >
            </div>
            <div class="field">
                <label>phone 2 : </label>
                <input  name="phone2" value=<?php echo e(old('phone2', $me)); ?> />
            </div>
        </div>
    <div class="field">
        <label>job : </label>
        <input value=<?php echo e(old('job', $me)); ?> name="job">
    </div>
    <div class="fields">
        <div class="eight wide field">
            <label><img src="Store/Images/<?php echo e(old('image', $me)); ?>" id="uploadMyImage" class="ui image rounded "/></label>
        </div>
       <div class="eight wide field dropzone">
           
           <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
       </div>
    </div>

    <div class="field">
        <label>Description</label>
        <textarea rows="3" name="description"><?php echo e(old('description', $me)); ?></textarea>
    </div>

    <div class="field">
        <label>About</label>
        <textarea name="about" ><?php echo e(old('about_me', $me)); ?></textarea>
    </div>

    <input type="submit" value="change settings" class="fluid ui blue button"/>
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('right-bar'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>