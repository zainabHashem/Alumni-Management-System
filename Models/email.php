 
<?php
require_once 'alumni.php';
class Contact 
{
    private $email;
    private $subject;
    private $message;
    private $id;
    private $alumniinfo;
    private $firstname;
    private $lastname;
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }
    public function getid()
    {
        return $this->id;
    }

    public function setid($id)
    {
        $this->id = $id;
    }
    public function setfirstname($firstname)
    {
         $this->firstname=$firstname;
    }
    public function getfirstname()
    {
         return $this->firstname;
    }
    public function setlastname($lastname)
    {
        $this->lastname = $lastname;
    }
    public function getlastname()
    {
        return $this->lastname;
    }


}