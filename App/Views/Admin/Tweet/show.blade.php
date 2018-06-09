
@extends('Admin.index')
@section('content')

    <div class="container">

        @if(!empty($tweets) && is_array($tweets))
            @foreach($tweets as $tweet)

                <div class="ui raised @if($tweet['is_show'] === 1) blue @else red @endif segment">
                    <div class="ui inline absolute right dropdown">
                        <div class="text"><i class="fa fa-edit"></i> Edit</div>
                        <i class="dropdown icon"></i>
                        <div class="menu">
                            <div class="item" >Edit</div>
                            <div class="item" >Delete</div>
                            <div class="item" >
                                @if($tweet['is_show'] === 1)
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
                                <img src="{{ image(me('image')) }}" width="50" height="50">
                            </a>
                            <div class="content">
                                @if( $tweet['email'] === 0)
                                    <a class="author">{{ $tweet['email'] }}</a>
                                @else
                                    <a class="author">{{ me('name') }}</a>
                                @endif
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

                        @if(!empty($comments) && is_array($comment))
                            @foreach($comments as $comment)
                            <div class="ui horizontal divider">
                                Comments
                            </div>
                                <div class="ui comments">
                                    <div class="comment">
                                        <a class="avatar">
                                            <img src="/images/avatar/small/matt.jpg">
                                        </a>
                                        <div class="content">
                                            <a class="author">{{ $comment['email'] }}</a>
                                            <div class="metadata">
                                                <span class="date">{{ date("m - d h:i",$comment['created_at']) }}</span>
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
                        <form class="ui reply form">
                            <div class="field">
                                <textarea></textarea>
                            </div>
                            <button class="ui blue button">
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
@endsection