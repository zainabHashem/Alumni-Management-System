<?php
require_once '../../Controllers/DBController.php';
require_once '../../Models/event.php';

class EventController
{
    protected $db;
    public function showPost()
    {
        $this->db = new DBController;
        if ($this->db->Connection()) {
            $query = "SELECT DISTINCT post.id,post.userid,`firstname`,`lastname`,`posttype`,`userimage`,`postimage`,`validation`,`postdescription`,`postdate`,`posttime` FROM `user` JOIN `post` ON user.id=post.userid LEFT JOIN `account` ON user.id=account.userid";
            return $this->db->select($query);
        } else {
            echo "Error in Database Connection";

            return false;
        }
    }

    public function showSavedPosts()
    {
        $this->db = new DBController;
        if ($this->db->Connection()) {
            $query = "SELECT DISTINCT savedposts.userid,user.id,`firstname`,`lastname`,`posttype`,`userimage`,`postimage`,`validation`,`postdescription`,`postdate`,`posttime` FROM `post` JOIN `savedposts` ON post.id=savedposts.postid JOIN `user` ON user.id=post.userid JOIN `account` ON user.id=account.userid";
            return $this->db->select($query);
        } else {
            echo "Error in Database Connection";

            return false;
        }
    }



    public function delete(Event $event)
    {
        $this->db = new DBController;
        if ($this->db->Connection()) {
            $id = $event->getPostId();
            $query = "DELETE FROM `post` WHERE id =$id";
            return $this->db->delete($query);
        } else {
            echo "Error in Database Connection";

            return false;
        }
    }


    public function insertEvent(Event $event)
    {

        $this->db = new DBController;
        if ($this->db->Connection()) {
            $post = $event->getPostDescription();
            session_start();
            //$_SESSION["id"]=1;
            //$_SESSION["role"]="Admin";
            //$id=$_SESSION["id"];
            $role="Admin";
            $type= $event->getPostType();
            if($role=="Admin"){
            $query = "INSERT INTO `post`( `posttype`, `validation`, `postdescription`, `userid`) VALUES ('$type','accepted','$post','1')";
            }
            else
            $query = "INSERT INTO `post`( `posttype`, `postdescription`, `userid`) VALUES ('$type','$post','2')";
            return $this->db->insert($query);
        } else {
            echo "Error in Database Connection";

            return false;
        }


    }



}

?>