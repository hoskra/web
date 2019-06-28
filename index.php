<?php

// fix this properly
error_reporting(E_ALL ^ E_NOTICE);

session_start();
$password = 'heslo';
$typedPassword = $_POST["password"];
$_SESSION["logged"];


include 'header.php';

if ( isset($_GET['signOff'])) { 
  $_SESSION["logged"] = false; 
} 

if ( ($password == $typedPassword) || $_SESSION["logged"] == true ) { 
    
  $_SESSION["logged"] = true;
    include 'content.php';

  } else {      
  
    include 'login.php';
  
  } 
      
include 'footer.php';
      
?>
