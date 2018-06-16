<?php
namespace App\Controllers\Tweets;


class TweetsCommentsController
{

    public function __construct()
    {
        $this->dtb = model("Tweets\\TweetsComments");
    }

    public function insert()
    {
        extract($_POST);
        $images = [
            "index_1.png","index_1.png","index_1.png","index_1.png","index_1.png","index_1.png","index_1.png","index_1.png","index_1.png","index_1.png"
        ];
        $index = ceil(rand(0,9));
        $array = [
            "tweet_id"  => $tweet_id,
            "email"     => me('name'),
            'user_id'    => auth('id'),
            "image"     => $images[$index],
            "text"      => $text
        ];
        try {
            $this->dtb->insert($array);
            redirect('back');

        } catch (\PDOException $e) {
            rMsg('f', $e->getMessage());
            redirect('back');
        }

    }
}
