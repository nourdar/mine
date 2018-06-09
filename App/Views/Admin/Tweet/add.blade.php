@extends('Admin.index')
@section('content')
    <form action="Admin/Tweets/PostTweet" method="post" class="ui form">
        <div class=" fields">
            <div class="sixteen wide field">
                <h4> Let's Tweet : </h4>
                <textarea name="tweet" id="skillsTextarea" >
                    {{ old('tweet') }}
                </textarea>
                <input type="submit" class="ui fluid blue button" value="Add Tweet Now ...">
            </div>
        </div>
    </form>
@endsection

@section('right-bar')
<h4>Latest Tweets: </h4>
@endsection()