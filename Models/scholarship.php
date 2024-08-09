<?php
require_once 'post.php';
class Scholarship extends Post
{
    public function getPostType()
    {
        return "scholarship";
    }
}
    
?>