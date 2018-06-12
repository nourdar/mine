@extends('Admin.index')
@section('content')
<h1 class="ui red header ">Edit My Personal Informations</h1>



<form class="ui form" method="post" action="{{ url('Admin/EditMe/MeUpdate') }}" enctype="multipart/form-data">
    <div class="field">
        <label>Name</label>
        <div class="two fields">
            <div class="field">
                <input  value="{{  old('name', $me) }}" name="name">
            </div>
            <div class="field">
                <input value="{{  old('surname', $me) }}" name="surname">
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
                <input type="date" value="{{  old('birthday', $me) }}" name="birthday">
            </div>
            <div class="field">
                <label>E-mail : </label>
                <input value="{{  old('email', $me) }}" name="email">
            </div>
            <div class="field">
                <label>phone 1 : </label>
                <input value="{{  old('phone1', $me) }}" name="phone1" >
            </div>
            <div class="field">
                <label>phone 2 : </label>
                <input  name="phone2" value="{{  old('phone2', $me) }}" />
            </div>
        </div>
    <div class="field">
        <label>job : </label>
        <input value="{{  old('job', $me) }}" name="job">
    </div>
    <div class="fields">
        <div class="eight wide field">
            <label><img src="Store/Images/{{ old('image', $me) }}" id="uploadMyImage" class="ui image rounded "/></label>
        </div>
       <div class="eight wide field dropzone">
           {{--<input name="image" type="file" value={{  old('image') }} class="input-file" >--}}
           <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
       </div>
    </div>

    <div class="field">
        <label>Description</label>
        <textarea rows="3" name="description">{{  old('description', $me) }}</textarea>
    </div>

    <div class="field">
        <label>About</label>
        <textarea name="about" >{{  old('about_me', $me) }}</textarea>
    </div>




@endsection

@section('right-bar')
    <div class="left-v-line "></div>
    <div class="clear"></div>
        <div class="ui form">
            <div class="fields">

                <div class=" four wide field">
                    <label><i class="fab fa-facebook"></i> Facebook </label>
                    <div class="ui  checkbox toggle ">
                        <input type="checkbox" {{ old('is_f_show',$me) }} name="facebookShow">
                    </div>
                </div>
                <div class="fourteen wide field">
                    <input type="url" name="facebook" value="{{ old('facebook',$me) }}">
                </div>
            </div>
            <div class="fields">

                <div class=" four wide field">
                    <label><i class="fab fa-twitter"></i> Twitter</label>
                    <div class="ui checkbox toggle ">
                        <input type="checkbox" {{ me('is_t_show',$me) }} name="twitterShow">
                    </div>
                </div>
                <div class="fourteen wide field">
                    <input type="url" name="twitter" value="{{ old('twitter',$me) }}">
                </div>
            </div>

            <div class="fields">

                <div class="four wide field">
                    <label><i class="fab fa-github-square"></i> Github </label>
                    <div class="ui  checkbox toggle ">
                        <input type="checkbox" {{ old('is_g_show',$me) }} name="githubShow">
                    </div>
                </div>
                <div class="fourteen wide field">
                    <input type="url" name="github" value="{{ old('github',$me) }}">
                </div>
            </div>
            </div>
        </div>
        <input type="submit" value="change settings" class="fluid ui blue button"/>
</form>
@endsection
