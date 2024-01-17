<!DOCTYPE html>
<html lang="en">
<?php 
include('dashboard/link.php');
$ipaddress = $_SERVER['REMOTE_ADDR'];
 // check the ip address match in database
$ip_database = mysqli_query($con,"SELECT * from monal_visitors where unique_ip='$ipaddress'");
if(mysqli_num_rows($ip_database)>0)
{

 $data =  mysqli_query($con,"INSERT monal_visitors set ip='$ipaddress',created_at=now()");
}
else{
 $data =  mysqli_query($con,"INSERT monal_visitors set unique_ip='$ipaddress',created_at=now()");

}

 // main page view

$main_page = mysqli_query($con,"SELECT * from monal_main_view");
$main = mysqli_fetch_array($main_page);

?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Monal Restaurnet</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo1.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Yummy
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo/logo.png" alt="">
        <h1>Monal <span>Restaurent</span></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="#hero">Home</a>  </li>
          <li><a href="#menu">Menu</a></li>
          <li><a href="#events">Events</a></li>
          <li><a href="#chefs">Chefs</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li> 
                   <li><a  target="_blank" href="https://www.google.com/maps/dir//Stare+Miasto,+61-001+Pozna%C5%84/@52.4095369,16.9088064,14z/data=!4m18!1m8!3m7!1s0x47045b49399cf863:0xf61cbcaacd7d3070!2sStare+Miasto,+61-001+Pozna%C5%84!3b1!8m2!3d52.4062479!4d16.928428!16s%2Fg%2F1hhh712bv!4m8!1m0!1m5!1m1!1s0x47045b49399cf863:0xf61cbcaacd7d3070!2m2!1d16.928428!2d52.4062479!3e3?entry=ttu">map</a></li> 
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <a class="btn-book-a-table" href="#book-a-table">Book a Table</a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up"><?php echo $main['title']; ?></h2>
          <p data-aos="fade-up" data-aos-delay="100"><?php echo $main['monal_text']; ?></p>
          <div class="d-flex text-white" data-aos="fade-up" data-aos-delay="200">
            <a href="#book-a-table" class="btn-book-a-table">Book a Table</a>
            <!-- https://www.youtube.com/watch?v=LXb3EKWsInQ -->
            <a href="<?php echo $main['url']; ?>" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="../dashboard/img/main_view/<?php echo $main['img']; ?>" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->
  
  <!-- ======= Menu Section ======= -->
  <section id="menu" class="menu">
    <div class="container" data-aos="fade-up">

      <div class="section-header">
        <h2>Our Menu</h2>
        <p>Check Our <span>Monal Menu</span></p>
      </div>

      <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">
        <?php 

        $menu= mysqli_query($con," SELECT * from food_category order by id asc");
        $j=1;

        while($row1=mysqli_fetch_assoc($menu))

          {?>
            <li class="nav-item">
              <a class="nav-link <?php if($j++=='1'){echo "active show";} ?>" data-bs-toggle="tab" data-bs-target="#<?php echo $row1['cat'];?>">
                <h4 class="text-uppercase"><?php  echo $row1["cat_name"]; ?></h4>
              </a>
            </li><!-- End tab nav item -->
          <?php }  ?>


        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

          <?php 
          $menu_select= mysqli_query($con," SELECT * from food_category order by id asc");
          $i=1;

          while($rows=mysqli_fetch_array($menu_select))
          {
            $id = $rows['id'];

            $l=$i++;

            ?>
            <div class="tab-pane fade  <?php if($l=='1'){echo "active show";} ?>" id="<?php echo$rows['cat']; ?>">

              <div class="tab-header text-center">
                <p>Menu</p>
                <h3 class="text-capitalize"><?php echo $rows['cat_name']; ?></h3>
              </div>

              <div class="row gy-5">








                <?php

                $menu= mysqli_query($con," SELECT * from food_cat_item where cat_id ='$id'");
            // echo "category /".$rows['cat'].'<br>';
                foreach($menu as $row)
                {
              //echo"item".$row['item_title'].$i++;
                  ?>



                  <div class="col-lg-4 menu-item food mb-5 pb-5">
                    <a href="../dashboard/img/food/<?php echo $row['item_img']; ?>" class="glightbox">
                      <img src="../dashboard/img/food/<?php echo $row['item_img']; ?>"   alt="<?php echo $row['item_img']; ?>">
                    </a>
                    <h4 class="text-capitalize"><?php echo $row['item_title']; ?></h4>
                    <p class="ingredients">
                      <?php echo $row['item_text']; ?>
                    </p>
                    <p class="price  ">
                      <span class="text-secondary" style="font-size: 17px; margin-bottom:10px; ">
                        <s>
                          <?php if(!empty($row['dis_amount'])){ echo "%".$row['dis_amount'];}else{ echo "";} ?> 
                          </s>
                          </span>
                            $<?php echo $row['amount']; ?>
                    </p>

                  </div>
                  <?php
                }
                ?>

              </div><!-- End Starter Menu Content -->
            </div>
            <?php
          }

          ?>







        </div>
      </section><!-- End Menu Section -->
      <main id="main">




        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials section-bg">
          <div class="container" data-aos="fade-up">

            <div class="section-header">
              <h2>Testimonials</h2>
              <p>What Are They <span>Saying About Us</span></p>
            </div>

            <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
              <div class="swiper-wrapper">

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="row gy-4 justify-content-center">
                      <div class="col-lg-6">
                        <div class="testimonial-content">
                          <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                            <i class="bi bi-quote quote-icon-right"></i>
                          </p>
                          <h3>Saul Goodman</h3>
                          <h4>Ceo &amp; Founder</h4>
                          <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2 text-center">
                        <img src="assets/img/testimonials/testimonials-1.jpg" class="img-fluid testimonial-img" alt="">
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="row gy-4 justify-content-center">
                      <div class="col-lg-6">
                        <div class="testimonial-content">
                          <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                            <i class="bi bi-quote quote-icon-right"></i>
                          </p>
                          <h3>Sara Wilsson</h3>
                          <h4>Designer</h4>
                          <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2 text-center">
                        <img src="assets/img/testimonials/testimonials-2.jpg" class="img-fluid testimonial-img" alt="">
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="row gy-4 justify-content-center">
                      <div class="col-lg-6">
                        <div class="testimonial-content">
                          <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                            <i class="bi bi-quote quote-icon-right"></i>
                          </p>
                          <h3>Jena Karlis</h3>
                          <h4>Store Owner</h4>
                          <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2 text-center">
                        <img src="assets/img/testimonials/testimonials-3.jpg" class="img-fluid testimonial-img" alt="">
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="row gy-4 justify-content-center">
                      <div class="col-lg-6">
                        <div class="testimonial-content">
                          <p>
                            <i class="bi bi-quote quote-icon-left"></i>
                            Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                            <i class="bi bi-quote quote-icon-right"></i>
                          </p>
                          <h3>John Larson</h3>
                          <h4>Entrepreneur</h4>
                          <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2 text-center">
                        <img src="assets/img/testimonials/testimonials-4.jpg" class="img-fluid testimonial-img" alt="">
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->

              </div>
              <div class="swiper-pagination"></div>
            </div>

          </div>
        </section><!-- End Testimonials Section -->

        <!-- ======= Events Section ======= -->
        <section id="events" class="events">
          <div class="container-fluid" data-aos="fade-up">

            <div class="section-header">
              <h2>Events</h2>
              <p>Share <span>Your Moments</span> In Our Restaurant</p>
            </div>

            <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
              <div class="swiper-wrapper">

                <?php $moment =mysqli_query($con,"SELECT * from monal_moments");
                while ($row = mysqli_fetch_array($moment)) {
    // code...
                 ?>
                 <div class="swiper-slide event-item d-flex flex-column justify-content-end" style="background-image: url('../dashboard/img/event/<?php echo $row['monal_img'];?>')">
                  <a href="moment.php?data=<?php echo $row['moment_title'];?>">
                    <h3 class="moment">
                      <?php echo $row['moment_title'];?>
                    </h3>
                  </a>
                  <?php if($row['amount']!='') { ?>
                    <div class="price align-self-start text-warning">$<?php echo $row['amount'];?></div>
                  <?php } ?>
                  <span class="description">
                   <?php echo  mb_strimwidth($row['moment_text'], 0, 170, "..."); ?>
                 </span>
               </div><!-- End Event item -->
             <?php } ?>
             

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Events Section -->

    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Chefs</h2>
          <p>Our <span>Proffesional</span> Chefs</p>
        </div>

        <div class="row gy-4">
<?php $chef_data = mysqli_query($con,"SELECT * from monal_chefs");
$k=1;
while($row = mysqli_fetch_array($chef_data)){ ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="<?php echo$k++;?>00">
            <div class="chef-member">
              <div class="member-img">
                <img src="../dashboard/img/chef_img/<?php echo $row['chef_img'];?>" class="img-fluid" alt="<?php echo $row['chef_img'];?>" style=" height: 20%!important;">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4 class="text-uppercase"><?php echo $row['chef_name'];?></h4>
                <span class="text-capitalize"><?php echo $row['chef_position'];?></span>
                <p><?php echo $row['chef_discription'];?></p>
              </div>
            </div>
          </div><!-- End Chefs Member -->
<?php } ?>
          

        </div>

      </div>
    </section><!-- End Chefs Section -->


    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>gallery</h2>
          <p>Check <span>Our Gallery</span></p>
        </div>

        <div class="gallery-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <?php $data = mysqli_query($con,"SELECT * from monal_gallary order by id desc");
            while ($row =mysqli_fetch_array($data)) {
               // code...
              ?>
            <div class="swiper-slide">
              <a class="glightbox" data-gallery="images-gallery" href="../dashboard/img/monal_gallary/<?php echo $row['img_name'];?>">
                <img src="../dashboard/img/monal_gallary/<?php echo $row['img_name'];?>" class="img-fluid vw-100"  alt="<?php echo $row['img_name'];?>">
              </a>
            </div>
          <?php } ?>

           
            
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Contact</h2>
          <p>Need Help? <span>Contact Us</span></p>
        </div>

        <div class="mb-3">
          <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d39839.93666327876!2d17.6495025!3d51.3847508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNTHCsDIzJzUxLjQiTiAxN8KwNDAnMTQuOCJF!5e0!3m2!1sen!2spl!4v1700931503439!5m2!1sen!2spl" frameborder="0" allowfullscreen></iframe>
        </div><!-- End Google Maps -->

        <div class="row gy-4">

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-map flex-shrink-0"></i>
              <div>
                <h3>Our Address</h3>
                <p>Street kolejowa, Miedzyborz 67, 56-513</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item d-flex align-items-center">
              <i class="icon bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>shishantkmrs@gmail.com</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>+48 727 825 007</p>
              </div>
            </div>
          </div><!-- End Info Item -->

          <div class="col-md-6">
            <div class="info-item  d-flex align-items-center">
              <i class="icon bi bi-share flex-shrink-0"></i>
              <div>
                <h3>Opening Hours</h3>
                <div><strong>Mon-Sun:</strong> 11:30 - 21:30
                  <strong>wednesday:</strong> Closed
                </div>
              </div>
            </div>
          </div><!-- End Info Item -->

        </div>




      </div>
    </section><!-- End Contact Section -->

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Book A Table</h2>
          <p>Book <span>Your Stay</span> With Us</p>
        </div>

        <div class="row g-0">

          <div class="col-lg-5 reservation-img" style="background-image: url(assets/img/reservation.jpg);" data-aos="zoom-out" data-aos-delay="200"></div>

          <div class="col-lg-7 d-flex align-items-center reservation-form-bg ">
            <form action="backend.php" method="post"  data-aos="fade-up" data-aos-delay="100" id="form-action">
              <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" style=" border-bottom-color:red;border-left-color: red;" required>
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="_email" data-msg="Please enter a valid email" style=" border-bottom-color:red;border-left-color: red;" required>
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars" style=" border-bottom-color:red;border-left-color: red;" required>
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6 ml-2">
                  <input type="datetime-local"  min="2017-06-01T08:30"
                  max="2077-06-30T10:30" name="date_time" class="form-control" id="date_time" placeholder="Date" data-rule="minlen:4" data-msg="Please enter at least 4 chars"  style=" border-bottom-color:red;border-left-color: red;" >
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">


                  <select class="form-control border-danger bg-light" name="reserve_table" id="reserved" placeholder="Table_" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required style=" border-bottom-color:red;border-left-color: red;">
                    <option value="">Reserve </option>
                    <option class="bg-success text-white" value="1">Whole Hotel</option>
                    <option value="1">Valentine Table</option> 
                    <option value="2">Window side Table</option> 
                    <option value="3">Secrete side Table</option> 
                  </select>
                  <div class="validate"></div>
                </div>
                <div class="col-lg-4 col-md-6">
                  <input type="number" class="form-control" name="people" id="people" placeholder="# of people" data-rule="minlen:1" data-msg="Please enter at least 1 chars" style=" border-bottom-color:red;border-left-color: red;" required>
                  <div class="validate" ></div>
                </div>
              </div>
              <div class="form-group mt-3">
                <textarea id="msg" class="form-control" name="message" rows="5" placeholder="Message" ></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3 ml-2">
                <!-- <div class="loading">Loading</div> -->
                <!-- <div class="error-message"></div> -->
                <div class="message"></div>
              </div>
              <div id="notification" class="text-danger h5"></div>
              <div class="text-center">
                <button id="submit" class="btn btn-danger" name="reserve">Book a Table</button>
              </div>
            </form>
          </div><!-- End Reservation Form -->

        </div>

      </div>
    </section><!-- End Book A Table Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <i class="bi bi-geo-alt icon"></i>
          <div>
            <h4>Address</h4>
            <p>
              A108 Adam Street <br>
              Poznan, Old Town 120 - PL<br>
            </p>
          </div>

        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-telephone icon"></i>
          <div>
            <h4>Reservations</h4>
            <p>
              <strong>Phone:</strong> +48 123 678 77<br>
              <strong>Email:</strong> monal@gmail.com<br>
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links d-flex">
          <i class="bi bi-clock icon"></i>
          <div>
            <h4>Opening Hours</h4>
            <p>
              <strong>Mon-sun: 11:30</strong> - 21:30<br>
              wednesday: Closed
            </p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a target="_blank" href="" class="twitter"><i class="bi bi-twitter"></i></a>
            <a target="_blank" href="" class="facebook"><i class="bi bi-facebook"></i></a>
            <a target="_blank" href="" class="instagram"><i class="bi bi-instagram"></i></a>
            <a target="_blank" href="" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright"><?php echo date('Y'); ?>
        &copy; Copyright <strong><span>Monal</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
       
        Designed by <a target="_blank" href="https://www.facebook.com/shishant.shtha"><i class="text-primary">Shis</i></a>
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
   jQuery(document).ready(function () {
    $('#submit').on('click',function(e){
     e.preventDefault();
        // alert('hello');
       // console.log('hello');
       // start
     formContainer  = $('#form-action');




// end
     var names = 'names';
     var customer_name = $('#name').val();
     var customer_email = $('#email').val();
     var customer_phone_no = $('#phone').val();
     var customer_date_time = $('#date_time').val();
     var customer_reserved = $('#reserved').val();
     var customer_nafri = $('#people').val();
     var customer_msg = $('#msg').val();

     if(customer_name!=='' && customer_email!=='' && customer_phone_no!=='' &&customer_date_time!=='' && customer_reserved!=='' && customer_nafri!==''){


       $.ajax({

        url:'backend.php',
        method:'POST',
        data:{names:names,customer_name:customer_name,customer_email:customer_email,customer_phone_no:customer_phone_no,customer_date_time:customer_date_time,customer_reserved:customer_reserved,customer_nafri:customer_nafri,customer_msg:customer_msg},
        success:function(response)
        {

          $('.message').fadeIn().html('<h5 class="text-success">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</h5>');
          setTimeout(function(){
            $('.message').fadeOut('slow');
          },10000);
        },
        error: function(response){

          alert(response);
        }

      });

     }
     else{
      $('#notification').fadeIn().html('Red Line box are must be required.');
      setTimeout(function(){
        $('#notification').fadeOut('slow');
      },2000);
    }
    e.preventDefault();
      $('#form-action')[0].reset(); // all form field will be empty
    });
  });

</script>

</body>

</html>