<?php
require_once '../../Controllers/DBController.php';
require_once '../../Models/event.php';

class PostController
{
    protected $db;
    public function showPost($type)
    {
        $this->db = new DBController;
        if ($this->db->Connection()) {
            $query = "SELECT DISTINCT post.id,post.userid,`firstname`,`lastname`,`posttype`,`userimage`,`uploadedimage`,`validation`,`postdescription`,`postlink`,`postdate`,`posttime`,`uploadedlink`,`uploadedfile` FROM `user` JOIN `post` ON user.id=post.userid LEFT JOIN `account` ON user.id=account.userid WHERE `posttype`='$type'";
            return $this->db->select($query);
        } else {
            echo "Error in Database Connection";
            return false;
        }
    }

    public function showSavedPosts($type)
    {
        $this->db = new DBController;
        if ($this->db->Connection()) {
            $query = "SELECT DISTINCT savedposts.userid,post.id,user.id as iduser,savedposts.id as savedid ,`firstname`,`lastname`,`posttype`,`userimage`,post.uploadedimage as postimage,`validation`,`postdescription`,`postlink`,`postdate`,`posttime`,`uploadedlink`,`uploadedfile` FROM `post` JOIN `savedposts` ON post.id=savedposts.postid JOIN `user` ON user.id=post.userid JOIN `account` ON user.id=account.userid WHERE `posttype`='$type'";
            return $this->db->select($query);
        } else {
            echo "Error in Database Connection";
            return false;
        }
    }



    public function delete($id)
    {
        $this->db = new DBController;
        if ($this->db->Connection()) {
            //$id = $event->getPostId();
            $query = "DELETE FROM `post` WHERE id =$id";
            return $this->db->delete($query);
        } else {
            echo "Error in Database Connection";
            return false;
        }
    }
    public function savePost($id)
    {
        $this->db = new DBController;
        if ($this->db->Connection()) {
            $userid = $_SESSION["userId"];
            $query = "SELECT * FROM `savedposts` WHERE savedposts.postid='$id' AND savedposts.userid='$userid'";
            $result = $this->db->select($query);
            if (count($result) === 0) {
                //$id = $event->getPostId();
                $query = "INSERT INTO `savedposts` (`id`, `postid`, `userid`)  VALUES ('','$id','$userid')";
                return $this->db->insert($query);
            } else {
                //echo "you saved this post before";
            }
        } else {
            echo "Error in Database Connection";
            return false;
        }
    }

    public function unsavePost($id)
    {
        $this->db = new DBController;
        if ($this->db->Connection()) {
            //$id = $event->getPostId();
            $query = "DELETE FROM `savedposts` WHERE id ='$id'";
            return $this->db->delete($query);
        } else {
            echo "Error in Database Connection";
            return false;
        }
    }


    public function react($id, $react)
    {
        $this->db = new DBController;
        if ($this->db->Connection()) {
            $userid = $_SESSION["userId"];
            $query = "SELECT * FROM `react` WHERE react.userid='$userid' AND react.postid='$id'";
            $result = $this->db->select($query);
            if (count($result) == 0) {

                $query = "INSERT INTO `react`( `react`, `userid`, `postid`) VALUES ('$react','$userid','$id')";
                return $this->db->insert($query);
            } else {
                //echo "you saved this post before";
            }
        } else {
            echo "Error in Database Connection";
            return false;
        }
    }

    public function comment($id, $comment)
    {
        $this->db = new DBController;
        if ($this->db->Connection()) {
            $userid = $_SESSION["userId"];

            $query = "INSERT INTO `interact`( `comment`, `userid`, `postid`) VALUES ('$comment','$userid','$id')";
            return $this->db->insert($query);
        } else {
            echo "Error in Database Connection";
            return false;
        }
    }
    

    public function showComment($id)
    {
        $this->db = new DBController;
        if ($this->db->Connection()) {
            $query = "SELECT DISTINCT `comment`, `userimage`,`firstname`,`lastname` FROM `interact` INNER JOIN `user` ON user.id=interact.userid INNER JOIN `account`ON user.id=account.userid WHERE interact.postid='$id'";
            return $this->db->select($query);

        } else {
            echo "Error in Database Connection";
            return false;
        }

    }

    public function totalReact($id)
    {
        $this->db = new DBController;
        if ($this->db->Connection()) {
            $query = "SELECT COUNT(`react`) AS totalreact FROM react WHERE react.postid='$id'";
            return $this->db->select($query);

        } else {
            echo "Error in Database Connection";
            return false;
        }
    }

    public function selectReact()
    {
        $this->db = new DBController;
        if ($this->db->Connection()) {
            //$id = $event->getPostId();
            $query = "SELECT * FROM `react` ";
            return $this->db->select($query);
        } else {
            echo "Error in Database Connection";
            return false;
        }
    }



    public function insertPost(Post $post, $type)
    {
        $this->db = new DBController;
        if ($this->db->Connection()) {
            $postdes = $post->getPostDescription();
            $uploadedImage = $post->getUploadedImage();
            $uploadedlink = $post->getUploadedLink();
            $uploadedFile = $post->getUploadedFile();
            session_start();

            $id = $_SESSION["userId"];


            if ($_SESSION["userRole"] == "Admin") {
                $query = "INSERT INTO `post`( `posttype`, `validation`, `postdescription`, `userid`,`uploadedimage`,`uploadedlink`,`uploadedfile`) VALUES ('$type','accepted','$postdes','$id','$uploadedImage','$uploadedlink','$uploadedFile')";
            } else
                $query = "INSERT INTO `post`( `posttype`, `postdescription`,`userid`,`uploadedimage`,`uploadedlink`,`uploadedfile`) VALUES ('$type','$postdes','$id','$uploadedImage','$uploadedlink','$uploadedFile')";
            return $this->db->insert($query);
        } else {
            echo "Error in Database Connection";
            return false;
        }
    }

    public function countPost()
    {

        $this->db = new DBController;
        if ($this->db->Connection()) {
            $query = "SELECT * FROM post";
            return $this->db->select($query);
        } else {
            echo "error in database connection";
            return false;
        }
    }

    public function showUser()
    {
        $this->db = new DBController;
        if ($this->db->Connection()) {
            $id = $_SESSION["userId"];
            $query = "SELECT  `firstname`, `lastname`,  `userimage` FROM `account` INNER JOIN `user`  ON user.id=account.userid WHERE user.id='$id' ";
            return $this->db->select($query);
        } else {
            echo "error in database connection";
            return false;
        }

    }

    public function deletpost(Post $post)
    {
        $this->db = new DBcontroller;
        if ($this->db->Connection()) {
            $id = $post->getPostId();
            $query = "delete from post where id= '$id'";
            return $this->db->delete($query);

        } else {
            echo "Error in Database Connection";
            return false;
        }
    }


    public function getallposts()
    {
        //$post = new Post;
        $_SESSION["id"] = $_SESSION["userId"];
        $this->db = new DBcontroller;
        if ($this->db->Connection()) {
            $query = "select post.id, post.posttype,post.validation,post.postdescription,post.postdate,post.posttime,post.uploadedimage,post.uploadedfile,post.postlink,post.uploadedlink,post.uploadedfile ,post.userid from post  ";
            return $this->db->select($query);
        } else {
            echo "Error in Database Connection";
            return false;
        }

    }

    public function addvalidation(Post $post)
    {
        //session_start();
        $this->db = new DBController;
        $validation = $post->getpostvalidation();
        $id = $post->getPostId();
        if ($this->db->Connection()) {

            $query = " UPDATE `post` SET `validation` = '$validation' WHERE `id` = '$id';";
            $result = $this->db->insert($query);
            if ($result != false) {
                $this->db->closeConnection();
                return true;
            } else {
                $_SESSION["errMsg"] = "Somthing went wrong... try again later";
                $this->db->closeConnection();
                return false;
            }
        } else {
            echo "Error in Database Connection";
            return false;
        }

    }








}

?>