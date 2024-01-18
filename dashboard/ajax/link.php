<?php 
$hostname = 'localhost';
$user_name = 'root';
$password = '';
$database = 'agency_duty';
 $con = mysqli_connect($hostname,$user_name,$password,$database);
 if(!$con){
 	echo"Databse proble-".mysql_error();
die();
 }
 ?>