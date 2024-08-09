<?php
require_once 'DBController.php';
class DonationController{

    protected $db;
    //1. Open connection.
    //2. Run query & logic.
    //3. Close connection
    public function getDonorInfo(){
        $this->db=new DBController;
        if($this->db->Connection())
        {
            $query="SELECT user.id, `firstname`,`lastname`, `phone`,`amount`,  `method` FROM `user` RIGHT JOIN `donation` ON user.id=donation.userid";
            return $this->db->select($query);
        }
        else
        {
            echo "Error in Database Connection";
            
            return false; 
        }
    }
    public function totalAmount(){
        $this->db=new DBController;
        if($this->db->Connection())
        {
            $query="SELECT SUM(`amount`) AS totalamount FROM donation";
            return $this->db->select($query);
            
        }
        else
        {
            echo "Error in Database Connection";
            return false; 
        }
    }

    public function donationForm(Donation $Donor){
        //session_start();
        //$_SESSION["id"]=2;
        $this->db=new DBController;
        $amount= $Donor->getAmount();
        $method= $Donor->getPaymentMethod();
        $phone= $Donor->getPhone();
        $id= $Donor->getId();
        if($this->db->Connection())
        {
            $query="INSERT INTO `donation` VALUES ('','$phone','$amount','$method','$id')";
            $result= $this->db->insert($query);           
            if($result!=false)
            {
                $this->db->closeConnection();
                return true;
            }
            else
            {
                $_SESSION["errMsg"]="Somthing went wrong... try again later";
                $this->db->closeConnection();
                return false;
            }
        }
        else
        {
            echo "Error in Database Connection";
            return false; 
        }

    }
        //select donations

         public function getalldonations(){
            //session_start();
            //$_SESSION["id"]=2;
            $this->db=new DBController;
            $donation=new Donation;
            if($this->db->Connection())
            {
                $query="select donation.id from `donation`  ORDER BY donation.id ";
                $result= $this->db->select($query);
                if ($result != false) {
                    $this->db->closeConnection();
                    return $result;
                } 
                else
                {
                    $_SESSION["errMsg"]="Somthing went wrong... try again later";
                    $this->db->closeConnection();
                    return false;
                }
            }
            else
            {
                echo "Error in Database Connection";
                return false; 
            }




    }

}
?>
