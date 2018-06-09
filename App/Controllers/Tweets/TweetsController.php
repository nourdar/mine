<?php

namespace App\Controllers\Tweets;

use \Core\Controllers\Controller;

class TweetsController extends Controller
{

    public function __construct()
    {
        $this->dtb = model("Tweets\\Tweets");
        $this->setPaginate(2);
    }

    public function index()
    {
        $tweets = $this->dtb->order('id', 'DESC')->paginate(0, $this->paginate['LIMIT'])->get();
        $comments = [];
        foreach ($tweets as $tweet) {
            for ($i = 0; $i<count($tweet); $i++) {
                $comment = $this->dtb->comments($tweet['id']);
                if (!empty($comment)) {
                    array_push($comments, $comment);
                }
            }
        }
        $currentPage = $this->dtb->paginate['CURRENT'];
        $result = [
            'tweets'      => $tweets,
            'comments'    => $comments,
            'dtb'         => $this->dtb,
            'currentPage' => $currentPage
        ];

        return view('Admin.Tweet.show', $result);
    }

    public function moreTweets($array)
    {
        extract($array);
        $tweets = $this->dtb->order('id', 'DESC')->paginate($current, $this->paginate['LIMIT'])->get();
        $comments = [];
        foreach ($tweets as $tweet) {
            for ($i = 0; $i<count($tweet); $i++) {
                $comment = $this->dtb->comments($tweet['id']);
                if (!empty($comment)) {
                    array_push($comments, $comment);
                }
            }
        }
        $currentPage = $this->dtb->paginate['CURRENT'];
        $result = [
            'tweets'      => $tweets,
            'comments'    => $comments,
            'dtb'         => $this->dtb,
            'currentPage' => $currentPage
        ];
              header('Content-Type: text/json');
        echo  json_encode($result);
    }
    public function add()
    {
        return view('Admin.Tweet.add');
    }

    public function insert()
    {
        extract($_POST);

        preg_match_all("/[@$]\w+/", $tweet, $result);

        if (count($result[0]) > 0) {
            $count = count($result[0]);
            for ($i=0; $i<$count; $i++) {
                if (strpos($tweet, $result[0][$i]) !== false) {
                      $tweet =  str_replace($result[0][$i], "<a href='#'>".$result[0][$i]."</a>", $tweet);
                }
            }
        }
        $array = [
          'text'    => $tweet
        ];

        try {
            $this->dtb->insert($array);
            rMsg('t', "Tweet Has Been Added With Successful ...");
            redirect('back');
        } catch (\PDOException $e) {
            rMsg('f', $e->getMessage());
            redirect('back');
        }
    }


}