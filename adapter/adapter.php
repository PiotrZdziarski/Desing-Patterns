<?php

namespace Adapter;

class Facebook {

    public function postToWallAndShow($msg) {
        echo "Posting message: ".$msg;
    }
}

interface SocialMediaAdapter {
    public function post($msg);
}

class FacebookAdapter implements SocialMediaAdapter {

    private $facebook;

    public function __construct(Facebook $facebook)
    {
        $this->facebook = $facebook;
    }

    public function post($msg)
    {
        $this->facebook->postToWallAndShow($msg);
    }
}