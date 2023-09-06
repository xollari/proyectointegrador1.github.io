<?php
  

  // Data 
  $DBhostname = 'sql306.infinityfree.com';  
  $DBusername = 'if0_34977783';
  $DBpassword = '7Ze4DL43wfsyho'; 
  $DBname = 'if0_34977783_dbunfv';
  


  //Connection
  $conn=mysqli_connect($DBhostname, $DBusername, $DBpassword, $DBname);
  
  if(!$conn){
    die("Connection failed". mysqli_connect_error());
  }
   

 ?>

 
    
