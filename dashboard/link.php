<?php 
$server = "localhost";
$user ="root";
$password ="";
$database="agency_duty";


// $server = "server347.web-hosting.com";
// $user ="mebldato_monal";
// $password ="*U0v-iwf~s-d";
// $database="mebldato_monal";
 $con = mysqli_connect($server,$user,$password,$database);
 if(!$con){
    die( "Database:".mysql_error());
 }
 

?>