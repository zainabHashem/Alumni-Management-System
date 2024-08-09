<?php
require_once 'post.php';

class Topic extends Post
{
    public function getPostType()
    {
        return "topic";
    }
}
    
?>