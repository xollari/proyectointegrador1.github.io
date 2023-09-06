<?php
$host     = 'sql306.infinityfree.com';
$username = 'if0_34977783';
$password = '7Ze4DL43wfsyho';
$dbname   ='if0_34977783_dbunfv';

$conn=mysqli_connect($host, $username, $password, $dbname);
  
  if(!$conn){
    die("Connection failed". mysqli_connect_error());
    }
?>    
   
