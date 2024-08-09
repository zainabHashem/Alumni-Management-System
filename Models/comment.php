<?php
require_once 'interact bahavior.php';
class Comment extends InteractBehavior
{  
    public function getInteractionType()
    {
        return "comment";
    }
}

?>