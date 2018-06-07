
<div class="ui top attached demo inverted menu">
    <a class="item sidebar-toggle">
        <i class="fa fa-bars fa-2x"> </i> &nbsp &nbsp Menu
    </a>
    <div class="ui red inverted menu">
        <a class="item " href="{{ url('/') }}" >Home Page</a>
    </div>

    @if(!empty(getPages()))
        <div class="ui center inverted  menu">
            @foreach(getPages() as $val)
                <a href="{{ url($val['url']) }}" class="item">
                    {{$val['text']}}
                </a>
            @endforeach
        </div>
    @endif

    <div class="ui right floated simple dropdown item">
        <img src="{{ image(me('image')) }}" class="ui  circular image inline-block" width="50" height="50"/>
        &nbsp
        {{   me('name')." ".me('surname') }}

        <div class="menu">
            <a href={{  url('Admin/EditMe')}} class="item"><i class="fa fa-user-cog"></i> &nbsp&nbsp Edit info</a>
            <a href={{  url('Admin/logout')}} class="item"><i class="fa fa-user-slash"></i> &nbsp&nbsp logout</a>
        </div>
    </div>

</div>

<div class="ui bottom attached segment pushable admin-segment">
    <div class="ui inverted left vertical sidebar menu">
        <a class="item" href="{{ url('Admin') }}">
            <h4 class="ui red ">
                <img src="{{ image(me('image')) }}" class="ui  circular image inline-block" width="50" height="50"/>
                {{   me('name') ." ". me('surname') }}</h4>
        </a>
        <div class="ui inverted segment">
        <div class="ui inverted accordion accordion-sidebar p-l-10">
            <div class="title">
               <i class="fa fa-user-circle"></i> &nbsp My Pesronal Settings
            </div>
            <div class="content">
                <div class="p-l-10">
                    <a href={{ url('Admin/EditMe') }}><i class="fa fa-pencil-alt"></i> &nbsp Edit Informations</a><br><br>
                    <a href="{{ url('Admin/EditMe/Skills') }}"><i class="fa fa-football-ball"></i> &nbsp show My Skills</a><br><br>
                    <a href="{{ url('Admin/EditMe/Skills/Add') }}"><i class="fa fa-football-ball"></i> &nbsp Add Skills</a><br><br>
                </div>
            </div>
            <hr>
            <div class="title"><i class="fa fa-wallet "></i> &nbsp Portfolio</div>
            <div class="content">
                <a href="#"><i class="fa fa-plus"></i> &nbsp  Add Item </a><br><br>
                <a href="#"><i class="fa fa-edit"></i> &nbsp  Show Items</a><br><br>
                <a href="#"><i class="fa fa-question-circle"></i> &nbsp Delete</a><br><br>
            </div>


            <hr>
            <div class="title">
                <i class="fab fa-facebook"></i> &nbsp;
                Social Connection
            </div>
            <div class="content">
                <a href="#"><i class="fa fa-newspaper"></i> &nbsp NewsLetter Subscribers</a><br><br>
                <a href="#"><i class="fab fa-twitter red"></i> &nbsp Show My Tweets</a><br><br>
                <a href="#"><i class="fa fa-plus-circle"></i> &nbsp Add Tweet</a><br><br>
            </div>
            <hr>
            <div class="title"><i class="fa fa-phone-volume "></i> &nbsp Contact</div>
            <div class="content">
                <a href="#"><i class="fa fa-envelope"></i> &nbsp  Contacts Messages</a><br><br>
                <a href="#"><i class="fa fa-adversal"></i> &nbsp Show Advises</a><br><br>
                <a href="#"><i class="fa fa-question-circle"></i> &nbsp Show Questions</a><br><br>
            </div>

        </div>
        </div>
<div class="clear"></div>

    </div>
    <div class="pusher">
        <div class="ui container mainContainer">



{{ ses('s_message') }}