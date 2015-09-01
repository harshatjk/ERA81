<?php
include 'config.php';

function dbConnection(){
  $con = new mysqli(SERVER,USERNAME,PASSWORD,DBNAME);
  if($con->connect_error){
    die("Connection failed:".$con->connect_error );
  }

  return $con;
}


?>
