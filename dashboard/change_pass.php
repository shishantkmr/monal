<?php

include( 'dashboard_assest/header.php' );
include( 'link.php' ); 
?>
<div class = 'container-fluid pt-4 px-4'>
	<div class = 'row'>
		<!-- flush accordion category -->
		<div class = 'col-sm-12 col-xl-12'>
			<div class = 'bg-secondary rounded h-100 p-4'>
				<form  method="POST" >
					<h6 class = 'mb-4'>CHANGE PASSWORD</h6>
					<!-- user data -->
					<div class="form-floating mb-3">
						<input type="email" name="emailid" class="form-control" id="floatingInput" placeholder="name@example.com">
						<label for="floatingInput">Email address</label>
					</div>
					<!-- password -->
					<div class="form-floating mb-4">
						<input type="password" id="password" name="password" class="form-control"  placeholder="Password">
						<label for="floatingPassword">Password</label>
					</div>
					<!-- re-password -->
					<div class="form-floating mb-4">
						<input type="password" name="password" class="form-control" id="confirm_password" placeholder="Password">
						<label for="floatingPassword">Confirm Password</label>
					</div>
					<div class="message form-floating mb-4 h5"></div>
					<div class="msg form-floating mb-4 h5"></div>
					<div class="d-flex align-items-center justify-content-between mb-4">
						
						<div class = 'm-n2 pt-5 float-end'>
							<button type = 'submit' class = 'submit btn btn-outline-success m-2'  name="password_change" disabled>Change Password</button>
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>
	<?php 
 if(isset($_POST['password_change'])){
 	 $old_email = $_SESSION['email']; 
$email = stripslashes($_REQUEST['emailid']); 



//remove back slash
    $clean_email = mysqli_real_escape_string($con,$email); //remove onconditional charactor
    $password = stripslashes($_REQUEST['password']);

   echo $clean_password = mysqli_real_escape_string($con,$password);
    if($clean_email!==''&& $clean_password!==''){
        // check the if user already exist
    $query = mysqli_query($con,"UPDATE sign_in set user_email ='$clean_email' , user_password ='".md5($clean_password)."' where user_email='$old_email'") or die ("Error in query: $query. ".mysql_error());;
     
     	$message = "Your password_changeed>>";
	echo " <script> window.location.href='dashboard.php?message=$message';</script>";
	exit;

} else{
	$message_error = "You Must Fill the form First >>";
	echo " <script> window.location.href='dashboard.php?message=$message_error';</script>";
	exit;
}
}

	 ?>
	<script>
						$(document).ready(function(){
							$("#password,#confirm_password").on('keyup',function(){

								var str = $('#password').val();
								if(/^[a-zA-Z0-9- ]*$/.test(str) == false) {
									$(".msg").html("Strong Password.... &#128539;").css('color','green');
  $(".submit").prop("disabled", false);
									
								}
								else{
  $(".submit").prop("disabled", true);
								
									
									$('.msg').html('Week Password use Special(!,@,#,$,%,^.&,*) &#128524;.').css('color', 'white');
								}
								if ($('#password').val() == $('#confirm_password').val()) {

									$(".message").html("Password <b>Matched</b>!").css('color','green');

								}else{
									$(".message").html("Password does not <b>Matching</b>!").css('color','red');

								}
							});

						});
						
					</script>
					<style>
						.disable{
   cursor: not-allowed;
   pointer-events: none;
}
					</style>
	<?php include( 'dashboard_assest/footer.php' );

?>