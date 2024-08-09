<?php 

//require_once '../Models/alumni.php';
require_once 'DBController.php';
class ProfileController
{
    protected $db;
    public function showPost($profileId)
    {
        $this->db = new DBController;
        if ($this->db->Connection()) {
            $query = "SELECT DISTINCT post.id,post.userid,`firstname`,`lastname`,`posttype`,`userimage`,`uploadedimage`,`validation`,`postdescription`,`postlink`,`postdate`,`posttime`,`uploadedlink`,`uploadedfile` FROM `user` JOIN `post` ON user.id=post.userid LEFT JOIN `account` ON user.id=account.userid WHERE account.userid='$profileId'";
            return $this->db->select($query);
        } else {
            $this->db->closeConnection();
            return false;
        }
    }

    public function delete($id)
    {
        $this->db = new DBController;
        if ($this->db->Connection()) {
            //$id = $event->getPostId();
            $query = "DELETE FROM `post` WHERE id ='$id'";
            return $this->db->delete($query);
        } else {
            echo "Error in Database Connection";
            return false;
        }
    }


    public function display($id, $key)
    {
        $this->db=new DBController;
        if($this->db->Connection())
        {
            //`firstname`,`lastname` FROM `account` INNER JOIN `user`ON account.userid=user.id;
            $query = "SELECT *, firstname, lastname FROM account INNER JOIN user ON account.userid=user.id WHERE userid = '$id'";
            $result=$this->db->select($query);
            if($result===false)
            {
                return false;
            }
            else
            {
                if(count($result)==0)
                {
                  
                    $this->db->closeConnection();
                    return false;
                }
                else
                {
                    return "{$result[0][$key]}";
                }
            }
    }
}

public function Manage($id,$key, $value)
    {
        $this->db=new DBController;
        $this->db->getConnect()->query("UPDATE account INNER JOIN user ON account.userid=user.id  SET $key = '$value' WHERE userid = '$id'");
    }
}
?>