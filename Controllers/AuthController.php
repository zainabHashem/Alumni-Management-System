<?php

require_once '../../Models/user.php';
require_once '../../Controllers/DBController.php';
class AuthController
{
    protected $db;

    public function login(User $user)
    {
        $this->db = new DBController;
        if ($this->db->Connection()) {
            $query = "select * from user where email='" . $user->getEmail() . "' and password ='" . $user->getPassword() . "'";
            $result = $this->db->select($query);
            if ($result === false) {
                echo "Error in Query";
                return false;
            } else {
                if (count($result) == 0) {
                    session_start();
                    $_SESSION["errMsg"] = "You have entered wrong email or password";
                    $this->db->closeConnection();
                    return false;
                } else {
                    session_start();
                    $_SESSION["userId"] = $result[0]["id"];
                    $_SESSION["userName"] = $result[0]["firstname"];
                    $_SESSION["profileAlumniId"] =  $_SESSION["userId"] ;

                    if ($result[0]["roleid"] == 1) {
                        $_SESSION["userRole"] = "Admin";
                    } else {
                        $_SESSION["userRole"] = "Alumni";
                    }
                    $this->db->closeConnection();
                    return true;
                }
            }
        } else {
            echo "Error in Database Connection";
            return false;
        }
    }


    public function register(Alumni $alumni)
    {
        $this->db = new DBController;
        if ($this->db->Connection()) {
            $ssn = $alumni->getnationalid();
            $query = "SELECT * from `alumnilist` where alumnilist.nationalid='$ssn'";
            $result = $this->db->select($query);
            if (count($result) == 0) {
                session_start();
                $_SESSION["errMsg"] = "You have entered wrong ssn";
                $this->db->closeConnection();
                return false;
            } else {
                $firstname = $alumni->getFirstName();
                $lastname = $alumni->getlastName();
                $email = $alumni->getEmail();
                $password = $alumni->getPassword();
                $query = "insert into user values ('','$firstname','$lastname','$email','$password',2)";
                $result = $this->db->insert($query);
                if ($result != false) {
                    session_start();
                    $_SESSION["userId"] = $result;
                    $_SESSION["profileAlumniId"] =  $_SESSION["userId"] ;
                    $alumni->setfirstname($_POST['firstname']);
                    $alumni->setlastname($_POST['lastname']);
                    $_SESSION["userRole"] = "Alumni";
                    $gradyear=$alumni->getGraduateYear();
                    $gender=$alumni->getgender();
                    $dep=$alumni->getDepartment();
                    $id=$_SESSION["userId"];
                    $query = "INSERT INTO `account`(`graduationyear`, `gender`, `department`, `userid`, `listid`) VALUES ('$gradyear','$gender','$dep','$id','$ssn')";
                    $result = $this->db->insert($query);
                    if($result!=false)
                    {
                        $this->db->closeConnection();
                        return true;
                    }
                    } else {
                    $_SESSION["errMsg"] = "Somthing went wrong... try again later";
                    $this->db->closeConnection();
                    return false;
                }
            }
        } else {
            echo "Error in Database Connection";
            return false;
        }
    }

}




?>