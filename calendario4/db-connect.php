<?php
$host     = 'localhost';
$username = 'id21118080_root2';
$password = '';
$dbname   ='id21118080_prueba_proyecto_uno';
$port = 3306; //Elimina esta linea

$conn = new mysqli($host, $username, $password, $dbname, $port); //Elimina: , $port
if(!$conn){
    die("Cannot connect to the database.". $conn->error);
}