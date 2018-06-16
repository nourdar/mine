<?php $__env->startSection('content'); ?>
<h1 class="ui red header ">Edit My Personal Informations</h1>



<form class="ui form" method="post" action="<?php echo e(url('Admin/EditMe/MeUpdate')); ?>" enctype="multipart/form-data">
    <div class="field">
        <label>Name</label>
        <div class="two fields">
            <div class="field">
                <input  value="<?php echo e(old('name', $me)); ?>" name="name">
            </div>
            <div class="field">
                <input value="<?php echo e(old('surname', $me)); ?>" name="surname">
            </div>
        </div>
    </div>
    <div class="field">
        <label>User Group : </label>
        <input value="<?php echo e(old('user_group', $me)); ?>" name="user_group">
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
                <input type="date" value="<?php echo e(old('birthday', $me)); ?>" name="birthday">
            </div>
            <div class="field">
                <label>E-mail : </label>
                <input value="<?php echo e(old('email', $me)); ?>" name="email">
            </div>
            <div class="field">
                <label>phone 1 : </label>
                <input value="<?php echo e(old('phone1', $me)); ?>" name="phone1" >
            </div>
            <div class="field">
                <label>phone 2 : </label>
                <input  name="phone2" value="<?php echo e(old('phone2', $me)); ?>" />
            </div>
        </div>
    <div class="field">
        <label>job : </label>
        <input value="<?php echo e(old('job', $me)); ?>" name="job">
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




<?php $__env->stopSection(); ?>

<?php $__env->startSection('right-bar'); ?>
    <div class="left-v-line "></div>
    <div class="clear"></div>
        <div class="ui form">
            <div class="fields">

                <div class=" four wide field">
                    <label><i class="fab fa-facebook"></i> Facebook </label>
                    <div class="ui  checkbox toggle ">
                        <input type="checkbox" <?php echo e(old('is_f_show',$me)); ?> name="facebookShow">
                    </div>
                </div>
                <div class="fourteen wide field">
                    <input type="url" name="facebook" value="<?php echo e(old('facebook',$me)); ?>">
                </div>
            </div>
            <div class="fields">

                <div class=" four wide field">
                    <label><i class="fab fa-twitter"></i> Twitter</label>
                    <div class="ui checkbox toggle ">
                        <input type="checkbox" <?php echo e(me('is_t_show',$me)); ?> name="twitterShow">
                    </div>
                </div>
                <div class="fourteen wide field">
                    <input type="url" name="twitter" value="<?php echo e(old('twitter',$me)); ?>">
                </div>
            </div>

            <div class="fields">

                <div class="four wide field">
                    <label><i class="fab fa-github-square"></i> Github </label>
                    <div class="ui  checkbox toggle ">
                        <input type="checkbox" <?php echo e(old('is_g_show',$me)); ?> name="githubShow">
                    </div>
                </div>
                <div class="fourteen wide field">
                    <input type="url" name="github" value="<?php echo e(old('github',$me)); ?>">
                </div>
            </div>
            </div>
        </div>
        <input type="submit" value="change settings" class="fluid ui blue button"/>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>