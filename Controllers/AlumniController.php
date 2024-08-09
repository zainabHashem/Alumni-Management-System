<?php
require_once 'DBController.php';
//require_once '../../Model/mentorForm.php';
class AlumniController{
    protected $db ;
    

    public function addMentor(MentorForm $mentor)
    {
        $this->db = new DBController;
        $topic=$mentor->getTopic();
        $day=$mentor->getDays();
        $time=$mentor->getTime();
        $from=$mentor->getDateFrom();
        $to=$mentor->getDateTo();
        $userid=$_SESSION["userId"];
        if($this->db->Connection())
        {
            $query="INSERT INTO `mentor`(`topic`, `days`, `time`, `date:To`, `date:From`, `userid`) VALUES ('$topic','$day','$time','$from','$to','$userid')";
            return $this->db->insert($query);
        }
        else
        {
            echo "Error in database connection";
            return false;
        }
    }

    public function getallprograms()
    {
        //session_start();
        //$_SESSION["id"] = 2;
        $this->db = new DBController;
        $donation = new Donation;
        if ($this->db->Connection()) {
            $query = "select mentor.id from `mentor`  ORDER BY mentor.id ";
            $result= $this->db->select($query);
            if ($result != false) {
                $this->db->closeConnection();
                return $result;
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