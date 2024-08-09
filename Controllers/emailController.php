<?php
require_once 'DBController.php';
class emailController
{
    protected $db;
    public function emailForm(Contact $mail)
    {

        //$_SESSION["id"] = 2;
        $id = $mail->getid();
        $this->db = new DBController;
        $email = $mail->getEmail();
        $subject = $mail->getSubject();
        $message = $mail->getMessage();
         
        $firstname = $mail->getfirstname();
        $lastname = $mail->getlastname();
        if ($this->db->Connection()) {
            $query = "INSERT INTO `email`(`email`,`subject`,`message`,`firstname`,`lastname`,`userid`) VALUES ('$email','$subject','$message','$firstname','$lastname','$id')";
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