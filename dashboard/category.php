<?php include( 'dashboard_assest/header.php' );
include( 'link.php' );
?>
<div class = 'container'>
	<div class = 'row'>
		<!-- category text -->
		<div class = 'container-fluid pt-4 px-4'>
			<div class = 'row'>
				<div class = 'col-sm-12 col-xl-6'>
					<div class = 'bg-secondary rounded h-100 p-4'>
						<form action="ajax/backend.php" method="POST" >
							<h6 class = 'mb-4'>Category</h6>
							<div class = 'form-floating mb-3'>
								<input type = 'text' class = 'form-control' id = 'floatingInput'
								placeholder = 'category name' name="cat_name" required>
								<label for = 'floatingInput'>Category </label>
							</div>
							<div class = 'form-floating'>
								<textarea class = 'form-control' placeholder = 'about the category'
								id = 'floatingTextarea' style = 'height: 70px;' name="cat_text"></textarea>
								<label for = 'floatingTextarea'>about the category</label>
							</div>
							<div class = 'm-n2 pt-5 float-end'>
								<button type = 'submit' class = ' btn btn-outline-success m-2'  name="cat_submit">Create</button>
							</div>
						</form>

					</div>
				</div>

				<!-- category list -->
				<div class = 'col-sm-12 col-xl-6'>
					<div class = 'bg-secondary rounded h-100 p-4'>
						<h6 class = 'mb-4'>Food Category Name</h6>
						<?php 
						$get_cat= mysqli_query($con,"SELECT cat_name from food_category") or die('error');
						
						?>
						
						<?php
						if(mysqli_num_rows($get_cat)>0) {
							$color = array("primary","secondary","success","info","dark","warning","danger","primary","secondary","success","info","primary","secondary","success","info","dark","warning","danger","primary","secondary","success","info");
							$i=0;
							while($row = mysqli_fetch_array($get_cat))
								{ ?>
									<div class = 'alert alert-<?php echo $color[$i++]; ?>' role = 'alert'><?php echo $row['cat_name']; ?></div>
									<?php
								}}
								?>


							</div>
						</div>
						<!-- category end -->
					</div>
				</div>
			</div>
			<?php include( 'dashboard_assest/footer.php' );
		?>