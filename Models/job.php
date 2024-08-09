<?php
require_once 'post.php';
class Job extends Post
{
    public function getPostType()
    {
        return "job";
    }
}
    
?>