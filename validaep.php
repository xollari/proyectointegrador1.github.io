<?php

  
  //Variables

  $email = $_POST['correo']; 
  $pass_user = $_POST['contrasena']; 


  include('conexion.php');
  
  //Connection
  $conn=mysqli_connect($DBhostname, $DBusername, $DBpassword, $DBname);

  if(!$conn){
    die("Connection failed". mysqli_connect_error());

  }else{
    //Consulta
    $sql="SELECT * FROM users where correo='$email' and contrasena='$pass_user'";
    $result=mysqli_query($conn,$sql);
    
    $fila=mysqli_num_rows($result);

    if($fila){
        header("Location:schoolmanagement/index.php");


    }else{
      ?>
      <?php
      include('registrarseE_P.html');
      //include('validaamd.php');
      ?>
      <style>
        .ErrorMsj{
          text-align: center;
          color: red;


        }
      </style>
      <h1 class="ErrorMsj">USUARIO INCORRECTO O NO EXISTE</h1>


      <?php


    }
   
  } 
  mysqli_close($conn);
    
    