<?php
namespace App\Database\Model\Tweets;

use Core\Database\Model;
use Core\Factory;

class Tweets extends Model
{
    /**
     * @var string
     */
    protected $table = "tweets";
    /**
     * @var \Nette\Database\Connection
     */
    public $dtb;
    /**
     * @var string
     */
    public $comments;
    /**
     * @var string
     */
    public $users;

    /**
     * Tweets constructor.
     */
    public function __construct()
    {
        $this->dtb = Factory::getdb();
        $this->comments = Factory::getModel('Tweets\TweetsComments');
        $this->users = Factory::getModel('Users');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function comments($id)
    {
        return $this->comments->select('*')->where('tweet_id = '.$id)->get();
    }

    /**
     * @param $user
     * @param $tweet
     * @return mixed
     */
    public function myTweet($tweet)
    {
        return $this->dtb->select('*')->where('user_group = me', 'tweet_id = '.$tweet)->get();
    }

    /**
     * @return mixed
     */
    public function myTweets()
    {
        return $this->dtb->select('*')->where('user_group = me')->get();
    }

    /**
     * @return mixed
     */
    public function visitorTweets()
    {
        return $this->dtb->select('*')->where('user_group = visitors')->get();
    }
}