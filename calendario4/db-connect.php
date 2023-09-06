<?php
$host     = 'localhost';
$username = 'root';
$password = '';
$dbname   ='calendario_bd';
$port = 3307; //Elimina esta linea

$conn = new mysqli($host, $username, $password, $dbname, $port); //Elimina: , $port
if(!$conn){
    die("Cannot connect to the database.". $conn->error);
}