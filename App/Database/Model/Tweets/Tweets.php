<?php
namespace App\Database\Model\Tweets;

use Core\Database\Model;
use Core\Factory;

class Tweets extends Model
{
    protected $table = "tweets";

    public $dtb;
    public $comments;

    public function __construct()
    {
        $this->dtb = Factory::getdb();
        $this->comments = Factory::getModel('Tweets\TweetsComments');
    }

    public function comments($id)
    {
        return $this->comments->select('*')->where('tweet_id = '.$id)->get();
    }
}