

<div class="ui top attached demo menu">
    <a class="item sidebar-toggle">
        <i class="fa fa-bars fa-2x"> </i> &nbsp Menu
    </a>
    <div class="ui right floated simple dropdown item"><?php echo $me->name()." ".$me->surname(); ?>
        &nbsp <i class="fa fa-user"></i>
        <div class="menu">
            <a href="?admin=me" class="item"><i class="fa fa-user-cog"></i>&nbsp Edit info</a>
            <a href="?admin=logout" class="item"><i class="fa fa-user-slash"></i>&nbsp logout</a>
        </div>
    </div>

</div>

<div class="ui bottom attached segment pushable">
    <div class="ui inverted left vertical sidebar menu">
        <a class="item" href="#">
            <h4 class="ui grey header"><?php echo $me->name()." ".$me->surname(); ?></h4>
            <p>Sign Out</p>
        </a>
        <a class="item">
            <i class="block layout icon"></i> Portfolio
        </a>
        <a class="item">
            <i class="block layout icon"></i> Skills
        </a>
        <a class="item">
            <i class="smile icon"></i> Ask Me
        </a>
        <a class="item">
            <i class="smile icon"></i> Advice Me
        </a>
        <a class="item">
            <i class="smile icon"></i> Contact Me
        </a>
clear
        
    </div>
    <div class="pusher">
        <div class="ui container mainContainer">