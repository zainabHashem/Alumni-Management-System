<?php  

session_start(); 
require_once '../../Controllers/DBController.php';
session_unset();
session_destroy();  
header("Location:login.php"); 
?> 