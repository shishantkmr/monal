<?php  include('dashboard_assest/header.php'); include("link.php"); ?>
<?php 
// total ip address
$today = date('Y-m-d');
$ip_count =mysqli_query($con,"SELECT created_at,ip,unique_ip,count(ip) as ips,   count(unique_ip) as u_ip  from monal_visitors where DATE(created_at) = '$today'");
$count_ip =mysqli_fetch_array($ip_count);

// total unique visitors
$uip_count =mysqli_query($con,"SELECT unique_ip,count(unique_ip) as u_ip  from monal_visitors where DATE(created_at) = '$today'");
$count_uip =mysqli_fetch_array($uip_count);
// this month unique visitors 
$data = mysqli_query($con,"SELECT  count(unique_ip) as unq_ip from monal_visitors where MONTH(created_at) =MONTH(now()) and YEAR(created_at)=YEAR(now())");
$month_uip=mysqli_fetch_array($data);
// total visiter 
$total_v = mysqli_query($con,"SELECT count(ip) as ips,   count(unique_ip) as u_ip from monal_visitors");
$total_visitor = mysqli_fetch_array($total_v);

?>

<div class="container">
    <div class="row">
     <!-- Sale & Revenue Start -->
     <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Today Visiter</p>
                        <h6 class="mb-0"><?php  echo  $count_ip['ips']+$count_ip['u_ip'];  ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Today Unique visitor </p>
                        <h6 class="mb-0"><?php echo $count_uip['u_ip']; ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-area fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Month Unique Visitors</p>
                        <h6 class="mb-0"><?php echo $month_uip['unq_ip']; ?></h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-pie fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Visitors</p>
                        <h6 class="mb-0"><?php echo $total_visitor['ips']+$total_visitor['u_ip']; ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->
    <div class="row">
       <!-- Widget Start -->
       <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-md-6 col-xl-4 ">
                <div class="h-100 bg-secondary rounded p-4 overflow-visible">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <h6 class="mb-0">Messages</h6>
                        <a href="">Show All</a>
                    </div>
                    <div id="messagess"></div>
                    <script>
                        $(document).ready(function () {
                            setInterval(function() {
                                messages();
                            },1000);
                            function messages(){
        // alert('hello');
                                const messages ='messages';
                                $.ajax({
                                    url:'ajax/backend.php',
                                    method:'POST',
                                    data:({messages:messages}),
                                    success:function(responses){
                                        $('#messagess').html(responses);
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
        // $('#post').html(msg);
                                        alert(msg);
                                    },
                                });
                            }
                        });
                    </script>





                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-secondary rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Calender</h6>
                        <a href="">Show All</a>
                    </div>
                    <div id="calender"></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-xl-4">
                <div class="h-100 bg-secondary rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Up Comming Events</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="d-flex mb-2">
                        <input class="form-control bg-transparent" type="text" placeholder="Enter task">
                        <button type="button" class="btn btn-primary ms-2">Add</button>
                    </div>
                    <div class="d-flex align-items-center border-bottom py-2">
                        <input class="form-check-input m-0" type="checkbox">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <span>Short task goes here...</span>
                                <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border-bottom py-2">
                        <input class="form-check-input m-0" type="checkbox">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <span>Short task goes here...</span>
                                <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border-bottom py-2">
                        <input class="form-check-input m-0" type="checkbox" checked>
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <span><del>Short task goes here...</del></span>
                                <button class="btn btn-sm text-primary"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center border-bottom py-2">
                        <input class="form-check-input m-0" type="checkbox">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <span>Short task goes here...</span>
                                <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center pt-2">
                        <input class="form-check-input m-0" type="checkbox">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <span>Short task goes here...</span>
                                <button class="btn btn-sm"><i class="fa fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="col-sm-12 col-xl-6"> -->
                        <!-- <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Who Booked Restaurent</h6>
                            <div class="owl-carousel testimonial-carousel">
                                <div class="testimonial-item text-center">
                                    <img class="img-fluid rounded-circle mx-auto mb-4" src="img/testimonial-1.jpg" style="width: 100px; height: 100px;">
                                    <h5 class="mb-1">Client Name</h5>
                                    <p><a href = "mailto:abc@example.com?subject = Feedback&body = Message">
Send Feedback
</a></p>
                                    <p><a href="tel:+48727825007">+48 727825007</a></p>
                                    <p class="mb-0">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                                </div>
                                <div class="testimonial-item text-center">
                                    <img class="img-fluid rounded-circle mx-auto mb-4" src="img/testimonial-2.jpg" style="width: 100px; height: 100px;">
                                    <h5 class="mb-1">Client Name</h5>
                                    <p>Profession</p>
                                    <p class="mb-0">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam</p>
                                </div>
                            </div>
                        </div> -->
                        <!-- </div> -->
                        <div class="col-sm-12 col-xl-12">
                            <div class="bg-secondary rounded h-100 p-4">
                                <iframe class="position-relative rounded w-100 vh-100"
                                src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d39839.93666327876!2d17.6495025!3d51.3847508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNTHCsDIzJzUxLjQiTiAxN8KwNDAnMTQuOCJF!5e0!3m2!1sen!2spl!4v1701009737684!5m2!1sen!2spl"
                                frameborder="0" allowfullscreen="" aria-hidden="false"         
                                tabindex="0" style="filter: grayscale(90%) invert(2%) contrast(83%); border: 0; "></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Widget End -->
            </div>
        </div><!--main row div-->
    </div><!--main container div-->

    <?php include('dashboard_assest/footer.php');?>