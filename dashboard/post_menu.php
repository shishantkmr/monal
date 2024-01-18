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
							<span style = 'margin-left:10px; text-transform:uppercase;'>food category</span>

						</button>
					</h2>
					<div id = 'flush-collapseOne' class = 'accordion-collapse collapse '
					aria-labelledby = 'flush-headingOne' data-bs-parent = '#accordionFlushExample'>
					<div class = 'accordion-body '>
						<!-- cat item input  -->
						<div>
							<div class = 'bg-secondary rounded h-100 '>
								<form action="ajax/backend.php" method="POST" enctype="multipart/form-data">

									<h6 class = 'mb-4'>Food Item</h6>
									<div class = 'form-floating mb-3'>
										<!-- select food category name  -->
										<?php 
										$get_cat= mysqli_query($con,"SELECT id,cat_name from food_category") or die('error');
										?>

										<select name ="cat_id" class = 'form-select' id = 'floatingSelect'
										aria-label = 'Floating label select example'>
										<option selected> Select Food Item</option>
										<?php 
										if(mysqli_num_rows($get_cat)>0){
											while($row = mysqli_fetch_array($get_cat)){ ?>


												<option class="text-capitalize" value = '<?php echo $row['id']; ?>'><?php echo $row['cat_name']; ?>
											</option>

										<?php }}
										?>

									</select>
									<label for = 'floatingSelect'>Food Itme</label>
								</div>
								<div class = 'form-floating mb-3'>
									<input name="food_name" type = 'text' class = 'form-control' id = 'floatingInput'
									placeholder = 'Food Name'>
									<label for = 'floatingInput'>Food Name </label>
								</div>
								<div class = 'form-floating mb-3'>
									<textarea name="food_text" class = 'form-control' placeholder = 'Food discription'
									id = 'floatingTextarea' style = 'height: 70px;'></textarea>
									<label for = 'floatingTextarea'>Food discription</label>
								</div>
								<!-- discount % -->
								<div class = 'form-floating mb-3'>
									<input name="dis_amount" type = 'text' class = 'form-control' id = 'floatingInput'
									placeholder = 'discount amount (%)'>
									<label for = 'floatingInput'>discount amount (%)</label>
								</div>
								<!-- amount -->
								<div class = 'form-floating mb-3'>
									<input name="amount" type = 'text' class = 'form-control' id = 'floatingInput'
									placeholder = '$25..'>
									<label for = 'floatingInput'>amount $.. </label>
								</div>
								<div class = 'mb-3 mt-3'>

									<input name="food_img" class = 'form-control bg-dark' type = 'file' id = 'formFile'>
								</div>
								<div class = 'm-n2 pt-3 pb-3 float-end'>
									<button name ="food_submit" type = 'submit' class = ' btn btn-outline-success m-2'>Create</button>
								</div>
							</form>
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
					<form action="ajax/backend.php" method="POST" enctype="multipart/form-data">
						<!-- <h6 class = 'mb-4'>Good Moments</h6> -->
						<div class = 'mb-3 mt-3'>

							<input name="event_img" class = 'form-control bg-dark' type = 'file' id = 'formFile'>
						</div>
						<!-- title -->
						<div class = 'form-floating mb-3'>
							<input type = 'text' name="event_title" class = 'form-control' id = 'floatingInput'
							placeholder = 'Event title '>
							<label for = 'floatingInput'>Event title </label>
						</div>


						<div class = 'form-floating mb-3'>
							<textarea name ="event_text" class = 'form-control' placeholder = 'Event describe'
							id = 'floatingTextarea' style = 'height: 70px;'></textarea>
							<label for = 'floatingTextarea'>Event describe in some word</label>
						</div>
						<!-- amount -->
						<div class = 'form-floating mb-3'>
							<input type = 'text' name="amount" class = 'form-control' id = 'floatingInput'
							placeholder = 'Event title '>
							<label for = 'floatingInput'>Amount </label>
						</div>

						<div class = 'm-n2 pt-3 pb-3 float-end'>
							<button type = 'submit' name='event_submit' class = ' btn btn-outline-success m-2'>Create</button>
						</div>
					</form>
				</div>
			</div>
			<!-- cat end -->
		</div>
	</div>
</div>

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
			<div class = 'accordion-body'>
				<!-- Monal moments and cat is same input box i used just for good layout  -->
				<div>
					<div class = 'bg-secondary rounded h-100 '>
						<!-- chefs image -->
						<form action="ajax/backend.php" method="POST" enctype="multipart/form-data">
							<h5 class="text-danger"><i>Image should be 600px*600px.</i></h5>
							<div class = 'mb-3 mt-3'>

								<input name="chef_image" class = 'form-control bg-dark' type = 'file' id = 'formFile'>
							</div>
							<!-- chefs name -->
							<div class = 'form-floating mb-3'>
								<input name="chef_name" type = 'text' class = 'form-control' id = 'floatingInput'
								placeholder = 'Chef name'>
								<label for = 'floatingInput'>Chef Name </label>
							</div>
							<!-- position -->
							<div class = 'form-floating mb-3'>
								<input name="chef_position" type = 'text' class = 'form-control' id = 'floatingInput'
								placeholder = 'Chef position'>
								<label for = 'floatingInput'>Chef position </label>
							</div>
							<!-- about the chef -->
							<div class = 'form-floating'>
								<textarea name="chef_description" class = 'form-control' placeholder = 'about the chef'
								id = 'floatingTextarea' style = 'height: 70px;'></textarea>
								<label for = 'floatingTextarea'>About the chef</label>
							</div>




							<div class = 'm-n2 pt-3 pb-3 float-end'>
								<button type = 'submit' name="chef_create" class = ' btn btn-outline-success m-2'>Create</button>
							</div>
						</form>
					</div>
				</div>
				<!-- cat end -->
			</div>
		</div>
	</div>
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
		<form action="ajax/backend.php" method="POST" enctype="multipart/form-data">
			<div class = 'mb-3 mt-3'>

				<h5 class="text-danger"><i>Image should be (width*height) 800px*600px.</i></h5>

			</div>
			<!-- drag and drop -->
			<div id="drop-area">

				<p>Drop images into dotted area</p>
				<input name="multi_img[]" type="file" id="fileElem" multiple accept="" onchange="handleFiles(this.files)">
				<label class="button" for="fileElem">...or select some by clicking here</label>
				
 
				<progress id="progress-bar" max=100 value=0></progress>
				<div id="gallery"></div>
			</div>
			<!--upload button  -->
			<div class = 'm-n2 pt-1 pb-3 float-end'>
				<button type = 'submit' name="gallary_create" class = ' btn btn-outline-success m-1'>Create</button>
			</div>
		</form>
	</div>
</div>
</div>
</div>
</div>
</div>
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
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
		font-size: 2em;
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