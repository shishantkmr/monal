<?php include( 'dashboard_assest/header.php' );
include( 'link.php' ); 
?>
<div class = 'container-fluid pt-4 px-4'>
	<div class = 'row'>
		<!-- flush accordion category -->
		<div class = 'col-sm-12 col-xl-6'>
			<div class = 'bg-secondary rounded h-100 p-4'>
				<!-- title will goes here -->
				<div class = 'accordion accordion-flush' id = 'accordionFlushExample'>
					<div class = 'accordion-item bg-transparent'>
						<h2 class = 'accordion-header' id = 'flush-headingOne'>
							<button class = 'accordion-button' type = 'button'
							data-bs-toggle = 'collapse' data-bs-target = '#flush-collapseOne'
							aria-expanded = 'true' aria-controls = 'flush-collapseOne'>
							<img class = 'rounded-circle' src = 'img/logo.png' alt = '' style = 'width: 40px; height: 40px; border:.5px solid ;   outline: rgba(255, 0, 0, 0.3) solid 5px;'>
							<span style = 'margin-left:10px; text-transform:uppercase;'>food category list</span>

						</button>
					</h2>
					<div id = 'flush-collapseOne' class = 'accordion-collapse collapse '
					aria-labelledby = 'flush-headingOne' data-bs-parent = '#accordionFlushExample'>
					<div class = 'accordion-body '>
						<!-- cat item input  -->
						<div>
							<div class = 'bg-secondary rounded h-100 '>			
								<h6 class = 'mb-4'>Food Item</h6>
								<div class = 'form-floating mb-3'>
									<!-- select food category name  -->
									<table class="table table-bordered table-hover">
										<thead class="font-weight-bold">
											<th class="text-center">S.n.</th>
											<th>Foods Title name</th>
											<th class="text-center" colspan="40">Action</th>
										</thead>
										<tbody>

											<?php 
											$get_cat= mysqli_query($con,"SELECT cat,id,cat_name,cat_text from food_category") or die('error');
											?>


											<?php 
											if(mysqli_num_rows($get_cat)>0){
												$i=1;
												while($row = mysqli_fetch_array($get_cat)){ ?>
													<tr>

														<td class="text-center"> <?php echo $i++; ?> </td>
														<td class="text-capitalize" value = '<?php echo $row['id']; ?>'><?php echo $row['cat_name']; ?>
													</td>
													<td class="text-center">
														<a  href="post_edit.php?name=<?php echo $row['cat']; ?>&action_name=category" ><i class="fas fa-edit"></i></a>

													</td>
													<td class="text-center">
														<a onclick="return checkDelete()" href="ajax/backend.php?name=<?php echo $row['cat']; ?>&action_name=cat_delete" ><i class="fas fa-trash"></i></a>

													</td>
												</tr>

											<?php }}
											?>
										</tbody>
									</table>
								</div>
								
							</div>
						</div>
						<!-- cat end -->
					</div>
				</div>
			</div>
			<div class = 'accordion-item bg-transparent'>
				<h2 class = 'accordion-header' id = 'flush-headingTwo'>
					<button class = 'accordion-button collapsed' type = 'button'
					data-bs-toggle = 'collapse' data-bs-target = '#flush-collapseTwo'
					aria-expanded = 'false' aria-controls = 'flush-collapseTwo'>
					<img class = 'rounded-circle' src = 'img/logo.png' alt = '' style = 'width: 40px; height: 40px; border:.5px solid ;   outline: rgba(255, 0, 0, 0.3) solid 5px;'>
					<span style = 'margin-left:10px; text-transform:uppercase;'>Monal Moments</span>

				</button>
			</h2>
			<div id = 'flush-collapseTwo' class = 'accordion-collapse collapse'
			aria-labelledby = 'flush-headingTwo' data-bs-parent = '#accordionFlushExample'>
			<div class = 'accordion-body'>
				<!-- Monal moments and cat is same input box i used just for good layout  -->
				<div>
					<div class = 'bg-secondary rounded h-100 '>
						<!-- select food category name  -->
						<div class="table-responsive"  >
							<table class="table table-bordered table-hover table-responsive">
								<thead class="font-weight-bold">
									<th class="text-center">S.n.</th>
									<th>Moment Title </th>
									<th>Moment description </th>
									<th>Amount </th>
									<th>Image </th>
									<th class="text-center" colspan="40">Action</th>
								</thead>
								<tbody>

									<?php 
									$moment= mysqli_query($con,"SELECT * from monal_moments") or die('error');
									?>


									<?php 
									if(mysqli_num_rows($moment)>0){
										$i=1;
										while($row = mysqli_fetch_array($moment)){ ?>
											<tr>
												<td><?php echo $i++; ?></td>
												<td><?php echo $row['moment_title']; ?></td>	
												<td><?php echo mb_strimwidth($row['moment_text'], 0, 50,"..."); ?></td>	
												<td><?php echo $row['amount']; ?></td>	
												<td class="moment_img">
													<img class="" src="img/event/<?php echo $row['monal_img']; ?>" alt="<?php echo $row['monal_img'];?>  " />

												</td>
												<td class="text-center">
													<a href="post_edit.php?name=<?php echo $row['moment_title']; ?>&action_name=event_edit" ><i class="fas fa-edit"></i></a>

												</td>
												<td class="text-center">
													<a onclick="return checkDelete()" href="ajax/backend.php?name=<?php echo $row['moment_title']; ?>&action_name=event_delete&img=<?php echo $row['monal_img']; ?>" ><i class="fas fa-trash"></i></a>

												</td>
											</tr>
										<?php }} ?>
									</tbody>
								</table>
							</div>

						</div>

					</div>
					<!-- cat end -->
				</div>
			</div>
		</div>
<!-- monal sub cat list -->
<div class = 'accordion-item bg-transparent'>
		<h2 class = 'accordion-header' id = 'flush-headingTwo2'>
			<button class = 'accordion-button collapsed' type = 'button'
			data-bs-toggle = 'collapse' data-bs-target = '#flush-collapseTwo_right2'
			aria-expanded = 'false' aria-controls = 'flush-collapseTwo'>
			<img class = 'rounded-circle' src = 'img/logo.png' alt = '' style = 'width: 40px; height: 40px; border:.5px solid ;   outline: rgba(255, 0, 0, 0.3) solid 5px;'>
			<span style = 'margin-left:10px; text-transform:uppercase;'>Monal Food Items
			</span>

		</button>
	</h2>
	<div id = 'flush-collapseTwo_right2' class = 'accordion-collapse collapse'
	aria-labelledby = 'flush-headingTwo2' data-bs-parent = '#accordionFlushExample'>
	<div class = 'accordion-body'>
		<!-- Monal sub cat -->
		<div>
			<div class = 'bg-secondary rounded h-100 '>
				<!-- monal sub cat -->
				<table class="table table-bordered table-hover table-responsive">
								<thead class="font-weight-bold">
									<th class="text-center">S.n.</th>
									<th>Sub-cat Title </th>
									<th>Dis-Amount </th>
									<th>Amount </th>
									<th>Image </th>
									<th class="text-center" colspan="40">Action</th>
								</thead>
								<tbody>

									<?php 
									$sub_cat= mysqli_query($con,"SELECT * from food_cat_item") or die('error');
									?>


									<?php 
									if(mysqli_num_rows($sub_cat)>0){
										$i=1;
										while($row = mysqli_fetch_array($sub_cat)){ ?>
											<tr>
												<td><?php echo $i++; ?></td>
												<td><?php echo $row['item_title']; ?></td>	
													
												<td><?php echo $row['dis_amount']; ?></td>	
												<td><?php echo $row['amount']; ?></td>	
												<td class="sub-cat-img">
													<img class="" src="img/food/<?php echo $row['item_img']; ?>" alt="<?php echo $row['item_img'];?>  " style="width:100px;height: 100px;">

												</td>
												<td class="text-center">
													<a href="post_edit.php?name=<?php echo $row['item_title']; ?>&action_name=sub-cat-edit&cat_id=<?php echo $row['cat_id']; ?>" ><i class="fas fa-edit"></i></a>

												</td>
												<td class="text-center">
													<a onclick="return checkDelete()" href="ajax/backend.php?name=<?php echo $row['item_title']; ?>&action_name=sub-cat-Delete&img=<?php echo $row['item_img']; ?>" ><i class="fas fa-trash"></i></a>

												</td>
											</tr>
										<?php }} ?>
									</tbody>
								</table>
			</div>
		</div>
		<!-- sub cat end -->
	</div>
</div>
</div>
<!-- monal sub cat list end -->
	</div>
</div>
</div>
<!-- category end -->
<!-- right side category -->
<div class = 'col-sm-12 col-xl-6'>
	<div class = 'bg-secondary rounded h-100 p-4'>
		<!-- title will goes here -->
		<div class = 'accordion accordion-flush' id = 'accordionFlushExample'>
			<div class = 'accordion-item bg-transparent'>
				<h2 class = 'accordion-header' id = 'flush-headingOne'>
					<button class = 'accordion-button' type = 'button'
					data-bs-toggle = 'collapse' data-bs-target = '#flush-collapseOne_right'
					aria-expanded = 'true' aria-controls = 'flush-collapseOne'>
					<img class = 'rounded-circle' src = 'img/logo.png' alt = '' style = 'width: 40px; height: 40px; border:.5px solid ;   outline: rgba(255, 0, 0, 0.3) solid 5px;'>
					<span style = 'margin-left:10px; text-transform:uppercase;'>Main view</span>

				</button>
			</h2>
			<div id = 'flush-collapseOne_right' class = 'accordion-collapse collapse '
			aria-labelledby = 'flush-headingOne' data-bs-parent = '#accordionFlushExample'>
			<div class = 'accordion-body '>
				<!-- cat item input  -->
				<div>
					<div class = 'bg-secondary rounded h-100 '>
						<!-- <h6 class = 'mb-4'>Main View</h6> -->
						<!-- main view start -->
						<table class="table table-bordered table-hover table-responsive">
							<thead class="font-weight-bold">
								<th class="text-center">S.n.</th>
								<th>Main page Title </th>
								<th>main page text </th>
								<th>Image </th>
								<th class="text-center" colspan="40">Action</th>
							</thead>
							<tbody>

								<?php 
								$main_view= mysqli_query($con,"SELECT * from monal_main_view") or die('error');
								?>


								<?php 
								if(mysqli_num_rows($main_view)>0){
									$i=1;
									while($row = mysqli_fetch_array($main_view)){ ?>
										<tr>
											<td><?php echo $i++.'.'; ?></td>
											<td><?php echo $row['title']; ?></td>	
											<td><?php echo mb_strimwidth($row['monal_text'], 0, 50,"..."); ?></td>	

											<td class="moment_img">
												<img class="" src="img/main_view/<?php echo $row['img']; ?>" alt="<?php echo $row['img'];?>  " />

											</td>
											<td class="text-center">
												<a href="post_edit.php?name=<?php echo $row['title']; ?>&action_name=mainpage_edit" ><i class="fas fa-edit"></i></a>

											</td>

										</tr>
									<?php }} ?>
								</tbody>
							</table>
							<!-- main view end -->

						</div>
					</div>
					<!-- cat end -->
				</div>
			</div>
		</div>
		<!-- monal checf -->
		<div class = 'accordion-item bg-transparent'>
			<h2 class = 'accordion-header' id = 'flush-headingTwo'>
				<button class = 'accordion-button collapsed' type = 'button'
				data-bs-toggle = 'collapse' data-bs-target = '#flush-collapseTwo_right'
				aria-expanded = 'false' aria-controls = 'flush-collapseTwo'>
				<img class = 'rounded-circle' src = 'img/logo.png' alt = '' style = 'width: 40px; height: 40px; border:.5px solid ;   outline: rgba(255, 0, 0, 0.3) solid 5px;'>
				<span style = 'margin-left:10px; text-transform:uppercase;'>Monal Chefs</span>

			</button>
		</h2>
		<div id = 'flush-collapseTwo_right' class = 'accordion-collapse collapse'
		aria-labelledby = 'flush-headingTwo' data-bs-parent = '#accordionFlushExample'>

		<div class = 'bg-secondary rounded h-100 '>
			<!-- <h6 class = 'mb-4'>Main View</h6> -->
			<!-- main view start -->
			<table class="table table-bordered table-hover table-responsive">
				<thead class="font-weight-bold">
					<th class="text-center">S.n.</th>
					<th>Main page Title </th>
					<th>main page text </th>
					<th>Image </th>
					<th class="text-center" colspan="40">Action</th>
				</thead>
				<tbody>

					<?php 
					$monal_chef= mysqli_query($con,"SELECT * from monal_chefs") or die('error');
					?>


					<?php 
					if(mysqli_num_rows($monal_chef)>0){
						$i=1;
						while($row = mysqli_fetch_array($monal_chef)){ ?>
							<tr>
								<td><?php echo $i++.'.'; ?></td>
								<td><?php echo $row['chef_name']; ?></td>	
								<td><?php $row['chef_position']; ?></td>
								<td><?php echo mb_strimwidth($row['chef_discription'], 0, 50,"..."); ?></td>	


								<td class="moment_img">
									<img class="" src="img/chef_img/<?php echo $row['chef_img']; ?>" alt="<?php echo $row['chef_img'];?>  " />

								</td>
								<td class="text-center">
									<a href="post_edit.php?name=<?php echo $row['chef_name']; ?>&action_name=chef_edit" ><i class="fas fa-edit"></i></a>

								</td>
								<td class="text-center">
									<a onclick="return checkDelete()" href="ajax/backend.php?name=<?php echo $row['chef_name']; ?>&img=<?php echo $row['chef_img']; ?>&action_name=chef_delete" ><i class="fas fa-trash"></i></a>

								</td>

							</tr>
						<?php }} ?>
					</tbody>
			</table>
				<!-- main view end -->

			</div>
		</div>
	</div>
	<!-- monal chef end -->
	<div class = 'accordion-item bg-transparent'>
		<h2 class = 'accordion-header' id = 'flush-headingThree'>
			<button class = 'accordion-button collapsed' type = 'button'
			data-bs-toggle = 'collapse' data-bs-target = '#flush-collapseThree_right'
			aria-expanded = 'false' aria-controls = 'flush-collapseThree'>
			<img class = 'rounded-circle' src = 'img/logo.png' alt = '' style = 'width: 40px; height: 40px; border:.5px solid ;   outline: rgba(255, 0, 0, 0.3) solid 5px;'>
			<span style = 'margin-left:10px; text-transform:uppercase;'>Monal Gallery</span>

		</button>
	</h2>
	<div id = 'flush-collapseThree_right' class = 'accordion-collapse collapse'
	aria-labelledby = 'flush-headingThree' data-bs-parent = '#accordionFlushExample'>
	<div class = 'accordion-body'>
		<!-- image gallery single image -->
<table class="table table-bordered table-hover table-responsive">
				<thead class="font-weight-bold">
					<th class="text-center">S.n.</th>
					
					<th>Image </th>
					<th class="text-center" colspan="40">Action</th>
				</thead>
				<tbody>

					<?php 
					$monal_gallery= mysqli_query($con,"SELECT * from monal_gallary") or die('error');
					?>


					<?php 
					if(mysqli_num_rows($monal_gallery)>0){
						$i=1;
						while($row = mysqli_fetch_array($monal_gallery)){ ?>
							<tr class="text-center">
								<td><?php echo $i++.'.'; ?></td>
								


								<td class="gallary_img">
									<img class="" src="img/monal_gallary/<?php echo $row['img_name']; ?>" alt="<?php echo $row['img_name'];?>" />


								</td>
								
								<td class="text-center">
									<a onclick="return checkDelete()" href="ajax/backend.php?img=<?php echo $row['img_name']; ?>&action_name=gallary_img_delete" ><i class="fas fa-trash"></i></a>

								</td>

							</tr>
						<?php }} ?>
					</tbody>
			</table>
	</div>
</div>
</div>
</div>
</div>
</div>
<!-- category end -->
</div>
</div>
<?php include( 'dashboard_assest/footer.php' );
?>

<style>
	/*drag and drop image*/
	@import url("https://fonts.googleapis.com/css?family=Playfair+Display|Roboto");

	#drop-area {
		border: 4px dashed pink;
		border-radius: 20px;
		width: 480px;
		font-family: sans-serif;
		margin: 70px auto;
		padding: 20px;
	}

	#drop-area.highlight {
		border-color: purple;
	}

	p {
		margin-top: 0;
		text-align: center;
/*			font-size: 2em;*/
font-family: "Playfair Display", serif;
}

.my-form {
	margin-bottom: 10px;
}

#gallery {
	margin-top: 10px;
}

#gallery img {
	width: 150px;
	height: 150px;
	margin-bottom: 10px;
	margin-right: 10px;
	vertical-align: middle;
	object-fit: cover;
}

.button {
	display: inline-block;
	padding: 10px;
	margin: 0 22%;
	background: pink;
	cursor: pointer;
	border-radius: 5px;
	border: 1px solid pink;
	font-family: "Roboto", serif;
}

.button:hover {
	background: aquamarine;
	color: #aaa;
	font-weight: bold;
}

#fileElem {
	display: none;
}

progress[value] {
	/* Reset the default appearance */
	-webkit-appearance: none;
	appearance: none;
	width: 100%;
	height: 15px;
}

progress[value]::-webkit-progress-bar {
	background-color: #eee;
	border-radius: 2px;
	box-shadow: 0 2px 5px rgba(0, 0, 0, 0.25) inset;
}

progress[value]::-webkit-progress-value {
	background-image: -webkit-linear-gradient(
		-45deg,
		transparent 33%,
		rgba(0, 0, 0, 0.1) 33%,
		rgba(0, 0, 0, 0.1) 66%,
		transparent 66%
	),
	-webkit-linear-gradient(top, rgba(255, 255, 255, 0.25), rgba(0, 0, 0, 0.25)),
	-webkit-linear-gradient(left, #09c, #f44);
	border-radius: 2px;
	background-size: 35px 20px, 100% 100%, 100% 100%;
}

</style>