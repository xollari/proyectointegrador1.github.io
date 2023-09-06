<?php
$DB_host = "sql306.infinityfree.com";
$DB_user = "if0_34977783";
$DB_pass = "7Ze4DL43wfsyho";
$DB_name = "if0_34977783_dbunfv";
try
{
 $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
 $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
 $e->getMessage();
}
?>