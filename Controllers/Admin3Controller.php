<?php
require_once "../../controllers/DBController.php";
//require_once "../../Models/post.php";
class AdminController
{
    protected $db ;
    

    public function getAllPosts()
    {
         $this->db=new DBController;
         if($this->db->Connection())
         {
           // SELECT `firstname`,`lastname`, `topic`, `days`, `time`, `validation`, `date:To`, `date:From`, `userid` FROM `mentor` INNER JOIN `user` ON user.id=mentor.userid
            $query="SELECT `firstname`,`lastname`,`posttype`, `join`, `validation`, `logout`, `date`, `userid` FROM `post`INNER JOIN `user` ON user.id=post.userid";
            //$query="SELECT `firstname`,`lastname` , `id`, `join`, `logout`, `date` FROM `post` ";
           // $query="SELECT `id`, `firstname`,`lastname`, `posttype`, `date`, `join`, `logout`, `date:To`, `userid` FROM `post` INNER JOIN `user` ON user.id=post.userid ";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function getAllFeedback()
    {
         $this->db=new DBController;
         if($this->db->Connection())
         {
           // SELECT `firstname`,`lastname`, `topic`, `days`, `time`, `validation`, `date:To`, `date:From`, `userid` FROM `mentor` INNER JOIN `user` ON user.id=mentor.userid
            $query="SELECT `firstname`,`lastname`,`emoji` ,`feedbackdesc`, `userid` FROM `feedback` INNER JOIN `user` ON user.id=feedback.userid";
            //$query="SELECT `firstname`,`lastname` , `id`, `join`, `logout`, `date` FROM `post` ";
           // $query="SELECT `id`, `firstname`,`lastname`, `posttype`, `date`, `join`, `logout`, `date:To`, `userid` FROM `post` INNER JOIN `user` ON user.id=post.userid ";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
}
?>