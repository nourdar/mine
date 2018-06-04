

<div class="ui top attached demo inverted menu">
    <a class="item sidebar-toggle">
        <i class="fa fa-bars fa-2x"> </i> &nbsp Menu
    </a>
    <div class="ui right floated simple dropdown item">
        <img src="<?php echo e(image(me('image'))); ?>" class="ui  circular image inline-block" width="50" height="50"/>
        &nbsp
        <?php echo e(me('name')." ".me('surname')); ?>


        <div class="menu">
            <a href=<?php echo e(url('admin/me')); ?> class="item"><i class="fa fa-user-cog"></i>&nbsp Edit info</a>
            <a href=<?php echo e(url('admin/logout')); ?> class="item"><i class="fa fa-user-slash"></i>&nbsp logout</a>
        </div>
    </div>

</div>

<div class="ui bottom attached segment pushable">
    <div class="ui inverted left vertical sidebar menu">
        <a class="item" href="<?php echo e(url('/')); ?>">
            <h4 class="ui red ">
                <img src="<?php echo e(image(me('image'))); ?>" class="ui  circular image inline-block" width="50" height="50"/>
                <?php echo e(me('name') ." ". me('surname')); ?></h4>
        </a>
        <div class="ui inverted segment">
        <div class="ui inverted accordion accordion-sidebar p-l-10">
            <div class="title">
               <i class="fa fa-user-circle"></i>&nbsp My Pesronal Settings
            </div>
            <div class="content">
                <div class="p-l-10">
                    <a href=<?php echo e(url('Admin/EditMe')); ?>>Edit Informations</a><br>
                </div>

            </div>
            <hr>
            <div class="title">News Lettre</div>
            <div class="content">Show Subscribers</div>
            
        </div>
        </div>
<div class="clear"></div>

    </div>
    <div class="pusher">
        <div class="ui container mainContainer">