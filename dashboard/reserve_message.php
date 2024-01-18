<?php 
include('link.php');
$id=$_GET['id'];
echo $id;
$result=mysqli_query($con,"SELECT * from monal_reserve where customer_name = '$id'");
if(mysqli_num_rows($result)>0){
	mysqli_query($con,"UPDATE monal_reserve set user_click='1' where customer_name= '$id'");
	$rows = mysqli_fetch_array($result);
	// echo $rows['customer_name']; 
}
include('dashboard_assest/header.php');

?>
<div class="row pt-2">
	<div class="col-sm-12 col-xl-6">
		<div class="bg-secondary rounded h-100 p-4">
			<h6 class="mb-4 text-capitalize"><i class="fa fa-user">	</i> <?php echo  $rows['customer_name'];  ?></h6>
			<div class="border rounded p-4 pb-2 mb-4">
				<figure>
					<blockquote class="blockquote">
						<p ><i class="fa fa-mail">	</i><?php echo $rows['customer_email']; ?> <span class="float-end"><i class="fa fa-calendar">	</i> <?php echo $rows['reserve_date_time']; ?></span></p><i class="fa fa-phone">	</i> <?php echo $rows['customer_phone_no']; ?>
						<hr/>
						<blockquote class="blockquote text-white text-capitalize">
							<p ><?php echo $rows['customer_message']; ?></p>
						</blockquote></br>
					</blockquote></br>
					<hr/>
					<figcaption class="blockquote-footer float-end ">
						<cite title="Source Title pb-5">
							<?php $date = new DateTime($rows['created_at']);
							$now = new DateTime("now");
							if($now->diff($date)->format("%y")!=='0'){
								echo $now->diff($date)->format("%y year %m month %d day %h hours and %i minutes ago");
							}
							elseif($now->diff($date)->format("%m")!=='0'){
								echo $now->diff($date)->format(" %m month %d day %h hours and %i minutes ago");
							}
							elseif($now->diff($date)->format("%d")!=='0'){
								echo $now->diff($date)->format("%d days %h hours and %i minutes ago");
							}
							elseif($now->diff($date)->format("%h")!=='0'){
								echo $now->diff($date)->format(" %h hour %i minutes ago");
							}
							else{
								echo $now->diff($date)->format(" %i minutes ago");
							}
							?>
						</cite>
					</figcaption>
				</figure>
			</div>
<button class="btn btn-primary float-end mb-2" onclick="history.go(-1);">Back </button>
		</div>
	</div>
</div>

<?php
include('dashboard_assest/footer.php');

?>