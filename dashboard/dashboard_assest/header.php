<!DOCTYPE html>
<html lang="en">
<?php session_start();
    if(!isset($_SESSION["email"])) {
        header("Location: signin.php");
        exit();
    } ?>
<head>
    
    <meta charset="utf-8">
    <title>Monal Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/logo.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.1.4/css/froala_editor.min.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/4.1.4/js/froala_editor.min.js"></script>
</head>

<body>

    <div class="container-fluid position-relative d-flex p-0">
         
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"> 
           <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status"> 
               <span class="sr-only">Loading...</span>
           </div>
       </div> 
       <!-- Spinner End -->


       <!-- Sidebar Start -->
       <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-secondary navbar-dark">
            <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
                <h3 class="text-primary"><img class="rounded-circle" src="img/logo.png" alt="" style="width: 50px; height: 40px;">Monal</h3>
            </a>
            <!-- <div class="d-flex align-items-center ms-4 mb-4">
                <div class="position-relative">
                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                    <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                </div>
                 <div class="ms-3">
                    <h6 class="mb-0">Monal</h6>
                    <span>Admin</span>

                </div>
            </div> -->
            <div class="navbar-nav w-100">
                <a href="dashboard.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                
                <!-- create food catogery -->
                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Category</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="category.php" class="dropdown-item">food category</a>
                        <a href="signup.html" class="dropdown-item">Sign Up</a>
                        <a href="404.html" class="dropdown-item">404 Error</a>
                        <a href="blank.html" class="dropdown-item active">Blank Page</a>
                    </div>
                </div> -->
                <!-- category end -->
                <!-- post -->
                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Posts</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="post_menu.php" class="dropdown-item">Menu Post</a>
                        <a href="typography.html" class="dropdown-item">Typography</a>
                        <a href="element.html" class="dropdown-item">Other Elements</a>
                    </div>
                </div> -->
                <!-- end post -->
                <!-- <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="button.html" class="dropdown-item">Buttons</a>
                        <a href="typography.html" class="dropdown-item">Typography</a>
                        <a href="element.html" class="dropdown-item">Other Elements</a>
                    </div>
                </div> -->

                <a href="category.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>category</a>

                <a href="post_menu.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Menu</a> 
                <a href="post_list.php" class="nav-item nav-link"><i class="fa fa-list me-2"></i>Menu list</a>

                <!-- <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a> -->
                   
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="dashboard.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>

                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">

                </form>
                <!-- notification -->
                <?php if(isset($_GET['message'])){ ?>
                    <div id="msg" class=" alert alert-success alert-dismissible fade show" role="alert" style=" position: relative; top:20%; left:10%;  width: auto; height: auto;z-index: 5000;">
                        <i class="fa fa-exclamation-circle me-2"></i> <?php   $msg = $_GET['message'];  echo $msg;?>
                        <button type="button" class="btn-close btn btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } if(isset($_GET['message_error'])){ ?>
                   <div id="msg"class="alert alert-primary alert-dismissible fade show text-danger" role="alert"style=" position: relative; top:20%; left:10%;  width: auto; height: auto;z-index: 5000; color: red;">
                    <i class="fa fa-exclamation-circle me-2"></i> <?php   $msg = $_GET['message_error'];  echo $msg;?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>



            <?php } ?>
            <div class="navbar-nav align-items-center ms-auto">
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <script>
                            $(document).ready(function(){

                             function show() {

                                var name="name";
                                $.ajax({
                                    url: 'message.php',
                                    method:'POST',
                                // dataType: 'json', 
                                    data:({name:name}),
                                    success:function(response){

                                     $('#message').html(response);

                                   //  console.log(response.count);
                                   //  $.each(response,function(key,value){
                                     
                                   // });

                                 },
                                 error: function (jqXHR, exception) {
                                    var msg = '';
                                    if (jqXHR.status === 0) {
                                        msg = 'Not connect.\n Verify Network.';
                                    } else if (jqXHR.status == 404) {
                                        msg = 'Requested page not found. [404]';
                                    } else if (jqXHR.status == 500) {
                                        msg = 'Internal Server Error [500].';
                                    } else if (exception === 'parsererror') {
                                        msg = 'Requested JSON parse failed.';
                                    } else if (exception === 'timeout') {
                                        msg = 'Time out error.';
                                    } else if (exception === 'abort') {
                                        msg = 'Ajax request aborted.';
                                    } else {
                                        msg = 'Uncaught Error.\n' + jqXHR.responseText;
                                    }
                                    
                                    alert(msg);
                                },
                            });

                            };

                            setInterval(function(){
                               show();
                               
                           },1000);
                        });
                    </script>
                    <?php 
                    include('../dashboard/link.php');
                    $last_ids = mysqli_query($con,"SELECT max(id) as id,count(monal_id) as count from monal_reserve");
                    $last_id = mysqli_fetch_array($last_ids);
                    $id = $last_id['id'];

                    $result = mysqli_query($con,"SELECT id, user_click from monal_reserve where id =$id ");

                    if(mysqli_num_rows($result)>0){

                        $row = mysqli_fetch_array($result);
                    }

                    ?>
                    <?php if($row['user_click']==''){ ?>
                        <i class="fa fa-envelope me-lg-2 mr-5 text-danger">
                            <sup class="mb-3 text-danger text-danger" id="count">
                                <?php  echo $last_id['count'];?>
                                
                            </sup>
                        </i>
                        <span class="d-none d-lg-inline-flex" >Message</span>
                    <?php } else{ ?>
                        <i class="fa fa-envelope me-lg-2 mr-5 text-white">
                            <sup class="mb-3 text-danger text-white " id="count">
                                <?php echo $last_id['count']; ?>
                                
                            </sup>
                        </i>
                        <span class="d-none d-lg-inline-flex" >Message</span>
                    <?php } ?>
                    
                </a>

                <!-- notification end -->
                <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                    <div class="" id="message"></div>
                    
                    
                    <!-- <a href="#" class="dropdown-item text-center">See all message</a> -->
                </div>
            </div>
            <!-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="fa fa-bell me-lg-2"></i>
                    <span class="d-none d-lg-inline-flex">Notificatin</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                    <a href="#" class="dropdown-item">
                        <h6 class="fw-normal mb-0">Profile updated</h6>
                        <small>15 minutes ago</small>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item">
                        <h6 class="fw-normal mb-0">New user added</h6>
                        <small>15 minutes ago</small>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item">
                        <h6 class="fw-normal mb-0">Password changed</h6>
                        <small>15 minutes ago</small>
                    </a>
                    <hr class="dropdown-divider">
                    <a href="#" class="dropdown-item text-center">See all notifications</a>
                </div>
            </div> -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <img class="rounded-circle me-lg-2" src="img/logo.png" alt="" style="width: 40px; height: 40px; border:1px solid red;">
                    <span class="d-none d-lg-inline-flex">Monal</span>
                </a>
                <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                    <!-- <a href="#" class="dropdown-item">My Profile</a> -->
                        <a href="change_pass.php" class="dropdown-item">change password</a>
                        <a href="ajax/log_out.php" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

