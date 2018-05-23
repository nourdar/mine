<h1>Edit My Personal Informations</h1>
<?php ses('s_message'); ?>


<form class="ui form" method="post" action="index.php?url=admin/meUpdate">

    <div class="field">
        <label>Name</label>
        <div class="two fields">
            <div class="field">
                <input  value=<?php echo $me->name(); ?> name="name">
            </div>
            <div class="field">
                <input value=<?php echo $me->surname(); ?> name="surname">
            </div>
        </div>
    </div>

    <div class="field">
        <label>Address</label>
        <div class="fields">
            <div class="twelve wide field">
                <input value="<?php echo $me->address(); ?>" name="address">
            </div>
        </div>
    </div>



        <div class="four fields">
            <div class="field">
                <label>Birthday : </label>
                <input type="date" value=<?php echo $me->birthday(); ?> name="birthday">
            </div>
            <div class="field">
                <label>E-mail : </label>
                <input value=<?php echo $me->email(); ?> name="email">
            </div>
            <div class="field">
                <label>phone 1 : </label>
                <input value=<?php echo $me->phone1(); ?> name="phone1">
            </div>
            <div class="field">
                <label>phone 2 : </label>
                <input value=<?php echo $me->phone2(); ?> name="phone2">
            </div>
        </div>
    <div class="field">
        <label>job : </label>
        <input value=<?php echo $me->job(); ?> name="job">
    </div>
    <div class="field">
        <label><img src="<?php  image($me->image()); ?>" width="50" height="50" class="image circular"/></label>
        <input name="image" type="file" value=<?php echo $me->image(); ?>  >
    </div>

    <div class="field">
        <label>Description</label>
        <textarea rows="3" name="description"><?php echo $me->Description(); ?></textarea>
    </div>

    <div class="field">
        <label>About</label>
        <textarea name="about" ><?php echo $me->about(); ?></textarea>
    </div>

    <input type="submit" value="change settings" class="ui button blue"/>
</form>
