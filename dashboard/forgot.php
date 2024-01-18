<?php 
session_start();
$error = array();

require "mail.php";
include('link.php');
	// if(!$con = mysqli_connect("sql111.epizy.com","epiz_28317872","Pv9wigHohd3","epiz_28317872_duty")){
if(!$con){

	die("could not connect");
}

$mode = "enter_email";
if(isset($_GET['mode'])){
	$mode = $_GET['mode'];
}

	//something is posted
if(count($_POST) > 0){

	switch ($mode) {
		case 'enter_email':
				// code...
		$email = $_POST['email'];
				//validate email
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			$error[] = "Please enter a valid email";
		}elseif(!valid_email($email)){
			$error[] = "That email was not found";
		}else{

			$_SESSION['forgot']['email'] = $email;
			send_email($email);
			header("Location: forgot.php?mode=enter_code");
			die;
		}
		break;

		case 'enter_code':
				// code...
		$code = $_POST['code'];
		$result = is_code_correct($code);

		if($result == "the code is correct"){

			$_SESSION['forgot']['code'] = $code;
			header("Location: forgot.php?mode=enter_password");
			die;
		}else{
			$error[] = $result;
		}
		break;

		case 'enter_password':
				// code...
		$password = $_POST['password'];
		$password2 = $_POST['password2'];

		if($password !== $password2){
			$error[] = "Passwords do not match";
		}elseif(!isset($_SESSION['forgot']['email']) || !isset($_SESSION['forgot']['code'])){
			header("Location: forgot.php");
			die;
		}else{

			save_password($password);
			if(isset($_SESSION['forgot'])){
				unset($_SESSION['forgot']);
			}

			header("Location: signin.php");
			die;
		}
		break;

		default:
				// code...
		break;
	}
}

function send_email($email){ 

	global $con;

	$expire = time() + (60 * 1);
	$code = rand(10000,99999);
	$email = addslashes($email);

	$query = "insert into codes (email,code,expire) value ('$email','$code','$expire')";
	mysqli_query($con,$query);

		//send email here
	send_mail($email,'Password reset',"Your code is " . $code);
}

function save_password($password){

	global $con;

	$password = md5($password);
	$email = addslashes($_SESSION['forgot']['email']);

	$query = "update sign_in set user_password = '$password' where user_email = '$email' limit 1";
	mysqli_query($con,$query);

}

function valid_email($email){
	global $con;

	$email = addslashes($email);

	$query = "select * from sign_in where user_email = '$email' limit 1";		
	$result = mysqli_query($con,$query);
	if($result){
		if(mysqli_num_rows($result) > 0)
		{
			return true;
		}
	}

	return false;

}

function is_code_correct($code){
	global $con;

	$code = addslashes($code);
	$expire = time();
	$email = addslashes($_SESSION['forgot']['email']);

	$query = "select * from codes where code = '$code' && email = '$email' order by id desc limit 1";
	$result = mysqli_query($con,$query);
	if($result){
		if(mysqli_num_rows($result) > 0)
		{
			$row = mysqli_fetch_assoc($result);
			if($row['expire'] > $expire){

				return "the code is correct";
			}else{
				return "the code is expired";
			}
		}else{
			return "the code is incorrect";
		}
	}

	return "the code is incorrect";
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-1.10.2.js" type="text/javascript" ></script>
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 	 <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<title>Forgot</title>
</head>
<body style="background-image:url(https://media.istockphoto.com/id/637268486/pl/zdj%C4%99cie/patan.jpg?s=2048x2048&w=is&k=20&c=CVrJIvFNwNuLZL7Dgdp3bwO634PtU3H7PHRAz9yaPbc=); background-size:cover; height: 1vh;">
	<style type="text/css">
	.flex-container {
  padding: 0;
  margin: 0;
  list-style: none;
  display: flex;
  align-items: center;
  justify-content: center;
}
.row {
  width: 50%;
}
.flex-item {
  background: red;
  padding: 5px;
/*  width: 200px;*/
/*  height: 150px;*/
  margin: 1px;
/*  line-height: 150px;*/
  color: white;
  font-weight: bold;
  font-size: 3em;
  text-align: center;
}
	*{
		font-family: tahoma;
		font-size: 13px;
	}

	form{
		width: 100%;
		
		margin: auto;

		padding: 10px;
	}

	.textbox{
		padding: 5px;
		width: 500px;
	}
	.login{font-size: 1.3rem;font-family: calibari;color: white;}
	.margin_top{position: relative; top: 200px;}
</style>

<?php 

switch ($mode) {
	case 'enter_email':
					// code...
	?>
<div class="flex-container">
	<div class=" row margin_top d-flex align-items-center justify-content-center ">

		<div class="flex-item card text-white bg-primary mb-3  text-center trans rounded " style="max-width: 85rem;">
			<div class="card-header bg-primary"><h1>Forgot Password</h1></div>
			<div class="card-body">

				<form method="post" action="forgot.php?mode=enter_email"> 

					<h3>Enter your email below</h3>
					<span style="font-size: 12px;color:red;">
						<?php 
						foreach ($error as $err) {
									// code...
							echo $err . "<br>";
						}
						?>
					</span>
<div class = 'form-floating mb-3'>
									<input type="email" name="email" placeholder="enter your email" class = 'form-control' id = 'floatingInput'
									 required>
									<label for = 'floatingInput'>Enter your email </label>
								</div>


					
					<br style="clear: both;">
					<input class="btn-lg btn-success" type="submit" value="Next">
					<br><br>
					<div ><a href="signin.php" class="text-white login btn-lg btn-secondary">Login</a></div>
				</form>


			</div>
		</div>
	</div>
</div>


	<?php				
	break;

	case 'enter_code':
					// code...
	?>
	<div class="flex-container">
	<div class="row margin_top d-flex align-items-center justify-content-center ">

		<div class="flex-item card text-white bg-primary mb-3  text-center trans " style="max-width: 85rem;">
			<div class="card-header"><h1>Forgot Password</h1></div>
			<div class="card-body">
				<form method="post" action="forgot.php?mode=enter_code" > 
					
					<h3>Enter your the code sent to your email</h3>
					<span style="font-size: 12px;color:red;">
						<?php 
						foreach ($error as $err) {
									// code...
							echo $err . "<br>";
						}
						?>
					</span>

					
<div class = 'form-floating mb-3'>
									<input name="code" placeholder="12345" type = 'text' class = 'form-control' id = 'floatingInput'
									 required>
									<label for = 'floatingInput'>OTP </label>
								</div>

					<br>
					<br style="clear: both;">
					<a class="ml-5" href="forgot.php">
						<input class="btn-lg btn-danger" type="button" value="Start Over">
					</a>
					<input class="ml-5 btn-lg btn-success" type="submit" value="Next" >
					<br><br>
					<div><a href="signin.php" class="login btn-lg btn-secondary">Login</a></div>
				</form>
			</div>
		</div>
	</div>
	</div>
	<?php
	break;

	case 'enter_password':
					// code...
?>
<div class="flex-container">
<div class="row margin_top d-flex align-items-center justify-content-center ">
	
	<div class="flex-item card text-white bg-primary mb-3  text-center trans " style="max-width: 85rem;">
		<div class="card-header"><h1>Rest Your New Password</h1></div>
		<div class="card-body">
			<form method="post" action="forgot.php?mode=enter_password"> 

				<h3>Enter your new password</h3>
				<span style="font-size: 12px;color:red;">
					<?php 
					foreach ($error as $err) {
									// code...
						echo $err . "<br>";
					}
					?>
				</span>
<div class = 'form-floating mb-3'>
									<input name="password" placeholder="New Password" type = 'text' class = 'form-control' id = 'floatingInput'
									 required>
									<label for = 'floatingInput'>Type password </label>
								</div>
								<div class = 'form-floating mb-3'>
									<input type = 'text' class = 'form-control' id = 'floatingInput'
									name="password2" placeholder="Retype Password">
									<label for = 'floatingInput'>Re-type password </label>
								</div>

				
				<br style="clear: both;">
				<a href="forgot.php">
					<input class="btn-lg btn-danger " type="button" value="Start Over" class="ml-5">
				</a>
				<input class="btn-lg btn-success" type="submit" value="Change" >
				<br><br>
				<div><a href="signin.php" class="login btn btn-secondary">Login</a></div>
			</form>
		</div>
	</div>
</div>
</div>
<?php
break;

default:
					// code...
break;
}

?>


</body>
</html>