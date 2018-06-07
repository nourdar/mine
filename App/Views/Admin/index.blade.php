@include('header')
@include('Admin.navbar')

<div class="ui stackable grid">
    <div class="ten wide column">
        <div class="ui relaxed gird">




            @yield('content')
        </div>
    </div>

    <div class="  six wide column ">
        <div class="ui relaxed gird">
            @yield('right-bar')
        </div>
    </div>
</div>

@include('Admin.footer')
@include('footer')