<?php
require_once 'user.php';
class Admin extends User
{
    static private $admin;
    private final function __construct()
    {
      
    }
   
    public static function getAdmin()
    {
        if (!isset(self::$admin)) self::$admin = new Admin();
        return self::$admin;
    }

    public function getRole()
    {
        return "admin";
    }

}


?>