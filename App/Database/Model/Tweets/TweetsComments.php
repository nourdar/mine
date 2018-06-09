<?php
namespace App\Database\Model\Tweets;

use Core\Database\Model;
use Core\Factory;

class TweetsComments extends Model
{
    protected $table = "tweets_comments";

    public $dtb;

    public function __construct()
    {
        $this->dtb = Factory::getdb();
    }
}