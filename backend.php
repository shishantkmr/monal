<?php 

  include('./dashboard/ajax/link.php');

if(isset($_POST['names']))
{
  $monal_id = 171;
  $customer_name = $_POST['customer_name'];
  $customer_email = $_POST['customer_email'];
  $customer_phone_no = $_POST['customer_phone_no'];
  $customer_nafri = $_POST['customer_nafri'];
  $reserve_date_time = $_POST['customer_date_time'];
  $reserve_table = $_POST['customer_reserved'];
  $customer_msg = $_POST['customer_msg'];
	// var_dump($customer_name); exit();
  $result=mysqli_query($con,"INSERT INTO monal_reserve SET monal_id = '$monal_id', customer_name = '$customer_name', customer_email= '$customer_email', customer_phone_no = '$customer_phone_no', reserve_date_time = '$reserve_date_time',customer_nafri = '$customer_nafri', customer_message = '$customer_msg', reserve_table_no = '$reserve_table', created_at = now()");

  echo"backend page";
  echo"<script>window.location.href='./index.php';</script>";
   
header('Location:index.php');

} 
?>