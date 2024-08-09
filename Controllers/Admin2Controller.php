<?php
 require_once'../../Controllers/DBController.php';
 require_once'../../Models/alumni.php';
 class AdminController {
    protected $db;
    public function addalumni(alumni $alumni){
    $this->db=new DBController();
    if( $this->db->Connection()) {
      $id=$alumni->getnationalid();
      $email= $alumni->getEmail();
      $name=$alumni->getFirstName();
      $department=$alumni-> getDepartment();
      $graduateyear=$alumni->getGraduateYear();

     $query="INSERT INTO `alumnilist` values ('$id','$email','$name','$department','$graduateyear')";
     return $this->db->insert($query);
  
     }
     else {
       echo " Error in database connection";
       return false ;
   }}

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

  public function deleteAlumni(Alumni $alumni)
  {
    $this->db = new DBController();

    if ($this->db->Connection()) {
      $nationalid = $alumni->getnationalid();
      $query = " DELETE FROM alumnilist
WHERE nationalid = '$nationalid';";

      return $this->db->delete($query);
    } else {
      echo "Error in database connection";
      return false;
    }
  }



 }
 ?>