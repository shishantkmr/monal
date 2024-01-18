<!DOCTYPE html>
<html lang="en">
<?php 
include('link.php');
clearstatcache();

session_start();
if(isset($_SESSION['email'])){
    header("location:dashboard.php");
}
?>


    <title>MONAL</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
   
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    

   

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">


<body style="background-image: url(https://img.freepik.com/free-photo/sunset-with-mountain-background_1340-41590.jpg?size=626&ext=jpg&ga=GA1.1.1803636316.1700697600&semt=ais); background-repeat:no-repeat; background-size:cover;">
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
    <div class="container-fluid position-relative d-flex p-0" >
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid" >
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4" >
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3" style="border: 1px solid red;">
                        <form action="" method="POST" name="signin">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="../index.php" class="">
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>MONAL</h3>
                            </a>
                            <h3>Sign In</h3>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <a href="forgot.php">Forgot Password</a>
                        </div>
                        <button type="submit" name="sign_in" class="btn btn-primary py-3 w-100 mb-4">Sign In</button>
                        <!-- <p class="text-center mb-0">Don't have an Account? <a href="">Sign Up</a></p> -->
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>
<?php 
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
      header("location:dashboard.php");
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
  <style>
      /* toast notification */
#toast {
  visibility: hidden;
  max-width: 450px;
  height: 50px;
  /*margin-left: -125px;*/
  margin: auto;
  background-color: green;
  color: #fff;
  text-align: center;
  border-radius: 2px;

  position: fixed;
  z-index: 1;
  left: 0;right:0;
  bottom: 30px;
  font-size: 17px;
  white-space: nowrap;
  
}
#toast #img{
  width: 50px;
  height: 50px;

  float: left;

  padding-top: 18px;
  padding-bottom: 16px;

  box-sizing: border-box;


  background-color: orange;
  color: #fff;
}
#toast #desc{


  color: #fff;

/*  padding: 10px;*/
padding-top:15px;
padding-right: 50px;
padding-left: 10px;
  overflow: hidden;
  white-space: nowrap;
  line-height: 20px;
}

#toast.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, expands 0.5s 0.5s,stay 3s 1s, shrink 0.5s 2s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, expands 0.5s 0.5s,stay 3s 1s, shrink 0.5s 4s, fadeout 0.5s 4.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 1;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 1;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes expands {
  from {min-width: 50px} 
  to {min-width: 350px}
}

@keyframes expands {
  from {min-width: 50px}
  to {min-width: 350px}
}
@-webkit-keyframes stay {
  from {min-width: 350px} 
  to {min-width: 350px}
}

@keyframes stay {
  from {min-width: 350px}
  to {min-width: 350px}
}
@-webkit-keyframes shrink {
  from {min-width: 350px;} 
  to {min-width: 50px;}
}

@keyframes shrink {
  from {min-width: 350px;} 
  to {min-width: 50px;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 60px; opacity: 1;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 60px; opacity: 1;}
}
/* toast notification end */
  </style>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
    const toggleForm = () => {
    const container = document.querySelector('.container');
    container.classList.toggle('active');
  };
</script>
<script>
    document.onkeydown=function(evt){
        var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        if(keyCode == 13)
        {
            //your function call here
            document.signin.submit();
           
        }
    }
</script>

</body>

</html>
