<?php
  

  // Data 
  $DBhostname = 'localhost';  
  $DBusername = 'id21118080_root2';
  $DBpassword = ''; 
  $DBname = 'id21118080_prueba_proyecto_uno';
  


  //Connection
  $conn=mysqli_connect($DBhostname, $DBusername, $DBpassword, $DBname);
  
  if(!$conn){
    die("Connection failed". mysqli_connect_error());
  }
   

 ?>

 
    
