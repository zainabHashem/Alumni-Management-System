<?php
require_once 'post.php';
class Question extends Post
{
    public function getPostType()
    {
        return "question";
    }

}
    
?>