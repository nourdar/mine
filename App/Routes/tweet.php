<?php

/**
 * GET Methods
 */


get('Admin/Tweets', 'Tweets@index');
get('Admin/Tweets/Add', 'Tweets@add');


/***
 * POST Methods
 */

post('Admin/Tweets/PostTweet', 'Tweets@insert');
post('Admin/Tweets/PostComment', 'TweetsComments@insert');
