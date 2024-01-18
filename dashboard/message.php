<?php 
include('link.php');

if(isset($_POST['name'])){
	$result = mysqli_query($con,"SELECT * from monal_reserve order by id desc");
	$data='';
	$count = mysqli_num_rows($result);
	$i=0;
	foreach ($result as $row) 
	{
		$data.="<a href='#' class='dropdown-item'>
                    <div class='d-flex align-items-center'>
                        <img class='rounded-circle' src='img/user.jpg' alt='' style='width: 40px; height: 40px;'>
                        <div class='ms-2'>
                            ";
                            if($row['user_click']==''){ $data.="<h6 class='fw-normal mb-0 text-danger' id='customer_name'>".$row['customer_name']."</h6>";
                            	}else{
                            		$data.="<h6 class='fw-normal mb-0 text-white' id='customer_name'>".$row['customer_name']."</h6>";}
                            $data.="
                        </div>
                    </div>
                </a>
                
                <hr class='dropdown-divider'>";
	}

	echo $data;
}


 ?>