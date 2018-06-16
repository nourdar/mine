
@extends('Admin.index')
@section('content')

    <div class="container">

        @if(!empty($tweets) && is_array($tweets))

            @foreach($tweets as $tweet)
                <div class="ui raised @if($tweet['is_show'] == 1) blue @else red @endif segment">
                    <div class="ui inline absolute right dropdown ">
                        <div class="text blue"><i class="fa fa-edit"></i> Edit </div>

                        <div class="menu">
                            <div class="item" >Edit</div>
                            <div class="item" >Delete</div>
                            <div class="item" >
                                @if($tweet['is_show'] == 1)
                                    <a href="#" data-value="0" class="black">Hide</a>
                                @else
                                    <a href="#" data-value="1" class="black">Show</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="ui comments">
                        <div class="comment">
                            <a class="avatar">
                                <img src="{{ $tweet['image'] }}" width="50" height="50">
                            </a>
                            <div class="content">
                                    <a class="author">{{ $tweet['email'] }}</a>
                                <div class="metadata">
                                    <span class="date">{{ $tweet['created_at']}}</span>
                                </div>
                                <div class="text ">
                                    <div class="p-l-10"><?php echo $tweet['text'] ?></div>
                                </div>
                                <div class="actions">
                                    <a class="reply">Like</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <br>
                    @if(isset($tweet['comments']) && !empty($tweet['comments']))
                        <div class="ui horizontal divider">
                            Comments
                        </div>
                            @foreach($tweet['comments'] as $comment)

                                <div class="ui comments">
                                    <div class="comment">

                                        <div class="ui inline absolute right dropdown">
                                            <div class="text"><i class="fa blue fa-arrow-circle-down"></i></div>
                                            <div class="menu">
                                                <div class="item" >Edit</div>
                                                <div class="item" >Delete</div>
                                            </div>
                                        </div>
                                        <a class="avatar">
                                            <img src="{{ icon($comment['image'], "Users") }}">
                                        </a>
                                        <div class="content">
                                            <a class="author">{{ $comment['email'] }}</a>
                                            <div class="metadata">
                                                <span class="date">{{ $comment['created_at'] }}</span>
                                            </div>
                                            <div class="text ">
                                                {{ $comment['text'] }}
                                            </div>
                                            <div class="actions">
                                                <a class="reply">Like</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                    @endif

                    <div class="ui horizontal divider">
                        Add Comment
                    </div>
                        <form class="ui reply form" method="post" action="{{ url("Admin/Tweets/PostComment") }}">
                            <input type="hidden" name="tweet_id" value="{{ $tweet['id'] }}"/>
                            <div class="field">
                                <textarea name="text">{{ old('comment') }}</textarea>
                            </div>
                            <button type="submit" class="ui blue button">
                                <i class="fa fa-edit"></i> Add Comment
                            </button>
                        </form>
                </div>
            @endforeach
            <button class="ui fluid blue button"><a href="{{ $currentPage }}">Show More Tweets</a></button>
        @else
            <div class="ui error message">
                <div class="header">Ooops Tweets Table is empty</div>
                <div class="content">There is No Tweet To Show</div>
            </div>
        @endif
    </div>

@endsection

@section('right-bar')
    @isset($noTweet)
        <div class="ui message warning">
            <div class="header">oops There is No Tweet To Shwo : </div>
            <p>
                - PLease Add Tweet<br>
                - Tweeting is amusing Try It It's Free <br>
            </p>
        </div>
    @endisset
    <div class="three column row">
        <div class="column"><h2>hello There thats test tttttttt</h2></div>
    </div>
@endsection