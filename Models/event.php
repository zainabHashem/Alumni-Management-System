<?php
require_once 'post.php';
class Event extends Post
{
    public function getPostType()
    {
        return "event";
    }
}
    
?>