@extends('Admin.index')
@section('content')
<h1>Edit My Personal Informations</h1>
{{ ses('s_message') }}

<form class="ui form" method="post" action="{{ url('admin/meUpdate') }}" enctype="multipart/form-data">
    <div class="field">
        <label>Name</label>
        <div class="two fields">
            <div class="field">
                <input  value={{  $me->giveMe('name') }} name="name">
            </div>
            <div class="field">
                <input value={{  $me->giveMe('surname') }} name="username">
            </div>
        </div>
    </div>

    <div class="field">
        <label>Address</label>
        <div class="fields">
            <div class="twelve wide field">
                <input value="{{  old('address', $me) }}" name="address">
            </div>
        </div>
    </div>
        <div class="four fields">
            <div class="field">
                <label>Birthday : </label>
                <input type="date" value={{  $me->giveMe('birthday') }} name="birthday">
            </div>
            <div class="field">
                <label>E-mail : </label>
                <input value={{  $me->giveMe('email') }} name="email">
            </div>
            <div class="field">
                <label>phone 1 : </label>
                <input value={{  $me->giveMe('phone1') }} name="phone1">
            </div>
            <div class="field">
                <label>phone 2 : </label>
                <input value={{  $me->giveMe('phone2') }} name="phone2">
            </div>
        </div>
    <div class="field">
        <label>job : </label>
        <input value={{  $me->giveMe('job') }} name="job">
    </div>
    <div class="fields">
        <div class="six wide field">
            <label><img src="{{  image($me->giveMe('image')) }}" id="uploadMyImage" class="ui image rounded "/></label>
        </div>
       <div class="eight wide field dropzone">
           {{--<input name="image" type="file" value={{  $me->giveMe('image') }} class="input-file" >--}}
           <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
       </div>
    </div>

    <div class="field">
        <label>Description</label>
        <textarea rows="3" name="description">{{  $me->giveMe('description') }}</textarea>
    </div>

    <div class="field">
        <label>About</label>
        <textarea name="about" >{{  $me->giveMe('about_me') }}</textarea>
    </div>

    <input type="submit" value="change settings" class="ui button blue"/>
</form>
@endsection