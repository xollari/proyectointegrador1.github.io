<?php
  
  
  //Variables

  $names = $_POST['nombres'];
  $email = $_POST['correo'];
  $name_user = $_POST['usuario'];
  $pass_user = $_POST['contrasena'];


  
  include ('conexion.php');
  
  
  //Conexion

  $conn=mysqli_connect($DBhostname, $DBusername, $DBpassword, $DBname);

  if(!$conn){
    die("Connection failed". mysqli_connect_error());
  }
  else{

  
    //Registro
    $sql="INSERT INTO users (codusuario, nombres, usuario, contrasena, correo) VALUES ('','$names','$name_user','$pass_user','$email')";
    $result=mysqli_query($conn,$sql);

    
    if($result){
      ?>
      <?php
      
      include('registrarseE_P.html');
      ?>
      <style>
        .SuccessMsj{
          text-align: center;
          color: green;


        }
      </style>
      <h1 class="SuccessMsj">REGISTRO EXITOSO</h1>
      <?php      


    }
    else{
      include('registrarseE_P.html');
      ?>
      <style>
        .ErrorMsj{
          text-align: center;
          color: red;


        }
      </style>
      <h1 class="ErrorMsj">ERROR EN EL REGISTRO</h1>
      <?php      



    }
 

 
  }
  
  mysqli_close($conn);  


 
    
