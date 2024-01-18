 <!-- toast notification -->
    <div id="toast"><div id="img" class="fa fa-check text-success text-white"></div><div id="desc"></div></div>
    <script>
      function launch_toast(msg) {
          var x = document.getElementById("toast");
          
          document.getElementById("desc").innerHTML=msg;
          x.className = "show";
          setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 5000);
      }

  </script>
  <!-- toast notification end -->
<?php 
include('link.php');
clearstatcache();
session_start();
    // When form submitted, insert values into the database.
if (isset($_POST['register'])) {

  // if user name and email blank
        // removes backslashes
  $username = stripslashes($_REQUEST['name']);
        //escapes special characters in a string
  $username = mysqli_real_escape_string($con, $username);
  $email    = stripslashes($_REQUEST['email']);
  $email    = mysqli_real_escape_string($con, $email);
  $raw_password = stripslashes($_REQUEST['password']);
  $password_md5=md5($raw_password);
  $password = mysqli_real_escape_string($con, $password_md5);
  $create_datetime = date("Y-m-d H:i:s");
  if($username!=='' OR $email!=='' OR $raw_password!==''){
        //check the user already exist or not

    $query = mysqli_query($con,"SELECT email FROM users WHERE email='$email'");

    if (mysqli_num_rows($query) != 0)
    {
      // <!-- echo "Username already exists"; -->
      echo"<script>
      launch_toast('You are already registered in our System!!!.');// notification lunch other code is in header.php
      </script>";
    }
    else{
      $result   = mysqli_query($con,"INSERT INTO sign_in set user_name='$username', user_email='$email',user_password='$password',create_datetime='$create_datetime'");

      if ($result) {
        echo"<script>
        launch_toast('Now login.');
       
        launch_toast('Your Data Saved!!!.');
         </script>";
      } else {
        echo"<script>
        launch_toast('You should to Register first!!!.');
        </script>";
      }}}}




  // login 
      if(isset($_POST['sign_in']))

      {
    $email    = stripslashes($_REQUEST['email']); //remove back slash
    $clean_email = mysqli_real_escape_string($con,$email); //remove onconditional charactor
    $password = stripslashes($_REQUEST['password']);
    $clean_password = mysqli_real_escape_string($con,$password);
        // check the if user already exist
    $check = mysqli_query($con,"SELECT * from sign_in where user_email ='$clean_email' and user_password ='".md5($clean_password)."'");
    $result = mysqli_num_rows($check);
    if($result ==1)
    {
   
    echo "hello";
      $_SESSION['email'] = $clean_email;
      header("location:../dashboard.php");
    }
    else
    {
      echo"go to check";
 echo"<script>
        launch_toast('Your Email and Password did not matched!!!.');
        </script>";
    }

  }
  ?>
   <script src="js/main.js"></script>
    <script>
    const toggleForm = () => {
    const container = document.querySelector('.container');
    container.classList.toggle('active');
  };
</script>