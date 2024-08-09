<?php
require_once "DBController.php";
//require_once "../../Model/mentorForm.php";
class AdminController
{
    protected $db ;
    

    public function getAllMentors()
    {
         $this->db=new DBController;
         if($this->db->Connection())
         {
            $query="SELECT `firstname`,`lastname`, `topic`, `days`, `time`, `validation`, `date:To`, `date:From`, `userid` FROM `mentor` INNER JOIN `user` ON user.id=mentor.userid";
            return $this->db->select($query);
         }
         else
         {
            echo "Error in Database Connection";
            return false; 
         }
    }
    public function getAlumni (){
      $this->db=new DBController();
      if( $this->db->Connection()) {
         $query="select * from alumnilist";
       return $this->db->select($query);
   
       }
       else {
         echo " Error in database connection";
         return false ;
     }
     }
}
?>