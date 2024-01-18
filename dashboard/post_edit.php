<?php include( 'dashboard_assest/header.php' );
include( 'link.php' );  ?>


<!-- text editor -->
<!-- text editorend -->
<div class = 'container-fluid pt-4 px-4'>
	<div class = 'row'>
		<?php if($_GET['action_name']=='category'){?>
			<!-- this box only run if action name came true from the post_list page -->
			<?php $cat=$_GET['name'];
			$result =mysqli_query($con,"SELECT cat,cat_text,cat_name,id from food_category where cat='$cat'");
			$row = mysqli_fetch_assoc($result);
			?>
			<div class = 'col-sm-12 col-xl-6'>
				<div class = 'bg-secondary rounded h-100 p-4'>
					<form action="ajax/backend.php" method="POST" >
						<h6 class = 'mb-4'>Category Edit</h6>
						<div class = 'form-floating mb-3'>
							<input type="hidden" name="cat" value="<?php echo $row['cat']; ?>">
							<input type = 'text' class = 'form-control' id = 'floatingInput'
							placeholder = 'category name' name="cat_name" value="<?php echo $row['cat_name']; ?>" required>
							<label for = 'floatingInput'>Category </label>
						</div>
						<div class = 'form-floating'>
							<textarea class = 'form-control' placeholder = 'about the category'
							id = 'floatingTextarea' style = 'height: 70px;' name="cat_text"><?php echo $row['cat_text']; ?></textarea>
							<label for = 'floatingTextarea'>about the category</label>
						</div>
						<div class = 'm-n2 pt-5 float-end'>
							<button type = 'submit' class = ' btn btn-outline-success m-2'  name="cat_update_submit">update</button>
						</div>
					</form>

				</div>
			</div>

		<?php } elseif($_GET['action_name']=='event_edit'){?>
			<!-- monal moments--------------------------------------------------------- -->
			<?php
			$moment_title= $_GET['name'];
			$event_result =mysqli_query($con,"SELECT * from monal_moments where moment_title='$moment_title'");
			$row = mysqli_fetch_array($event_result);
			// echo $row['id'];exit();
			?> 

			
			<div class = 'accordion-body '>
				<!-- cat item input  -->
				

				<div class = 'bg-secondary rounded h-100 '>
					<form action="ajax/backend.php" method="POST" enctype="multipart/form-data">
						<!-- <h6 class = 'mb-4'>Good Moments</h6> -->
						<div class = 'mb-3 mt-3'>
							<input type="hidden" name="old_image" value="<?php echo $row['monal_img'];?>">
							<input type="hidden" name="old_title" value="<?php echo $moment_title ;?>">
							
							<!-- title -->
							<div  class = 'form-floating mb-3'>
								<input id="froala"  type = 'text' name="event_title" class = 'form-control' id = 'floatingInput'
								placeholder = 'Event title ' value="<?php echo $row['moment_title']; ?>">
								<label for = 'floatingInput'>Event title </label>
							</div>


							<div class = 'form-floating mb-3'>
								<textarea  id="froala"   name ="event_text" class = 'form-control' placeholder = 'Event describe'
								id = 'floatingTextarea' style = 'height: auto;'><?php echo $row['moment_text']; ?></textarea>

							</div>
							<script> 

								var editor = new FroalaEditor('#froala');
	// 						 	new FroalaEditor('#froala','#froala1',{
    //     toolbarInline:true,
    //     charCounterCount:false
    // });
							</script>
							<!-- amount -->
							<div class = 'form-floating mb-3'>
								<input  type = 'text' name="amount" class = 'form-control' id = 'floatingInput'
								placeholder = 'Event title ' value="<?php echo $row['amount']; ?>">
								<label for = 'floatingInput'>Amount </label>
							</div>
							<div class="form-floating mb-3 pb-3">
								<input name="event_img" class = 'form-control bg-dark' type = 'file' id = 'formFile'>
							</div>

							<div class="form-floating mb-3 pt-3">
								<img class="universal_img img-thumbnail" src="img/event/<?php echo $row['monal_img']; ?>" alt="<?php echo $row['monal_img']; ?>">
							</div>

							<div class = 'm-n2 pt-3 pb-3 float-end'>
								<button type = 'submit' name='event_update_submit' class = ' btn btn-outline-success m-2'>update</button>
							</div>
						</form>
					</div>
				</div>

				<!-- end monal events---------------------------------------------------- -->
				<!-- start main page section ---------------------------------------------------- -->
				<?php
			} elseif($_GET['action_name']=='mainpage_edit'){
				?>


				<?php
				$title = $_GET['name'];
				$main_view =  mysqli_query($con,"SELECT * from monal_main_view where title='$title'");
				$edit = mysqli_fetch_array($main_view);
				if(mysqli_num_rows($main_view)>0){
					?> 
					<div class = 'col-sm-12 col-xl-12'>
						<div class = 'bg-secondary rounded h-100 p-4'>
							<form action="ajax/backend.php" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="old_title" value="<?php echo $edit['title'];?>">
								<input type="hidden" name="old_image" value="<?php echo $edit['img'];?>">

								<div class = 'form-floating mb-3'>
									<input type = 'text' class = 'form-control' id = 'floatingInput'
									placeholder = 'category name' name="title" value="<?php echo $edit['title'];?>" required>
									<label for = 'floatingInput'>Header </label>
								</div>
								<!-- text -->
								<div class = 'form-floating mb-3'>
									<textarea id="froala1" id = 'floatingInput_1' class = 'form-control' id = 'floatingInput' placeholder = 'text' name="text">  <?php echo $edit['monal_text'];?></textarea>
									<!-- <label for = 'floatingInput'>Text </label> -->
								</div>
								<!-- video  -->
								<div class = 'form-floating mb-3'>
									<input type = 'text' class = 'form-control' id = 'floatingInput'
									placeholder = 'Youtube video link' name="url" value="<?php echo $edit['url'];?>">
									<label for = 'floatingInput'>Youtube video link </label>
								</div>

								<div class = 'mb-3 mt-3'>

									<input class = 'form-control bg-dark' type = 'file' id = 'formFile' name="img">

									<img src="img/main_view/<?php echo $edit['img'];?>" alt="<?php echo $edit['img'];?>" class="img-fluid universal_img">
								</div>
								<div class = 'm-n2 pt-3 pb-3 float-end'>
									<button type = 'submit' class = ' btn btn-outline-success m-2' name="main_view_update">update</button>
								</div>

							</form>
						</div>
						<script> 

							var editor = new FroalaEditor('#froala1');

						</script>
					</div>
				<?php } ?>
				<!-- end main page---------------------------------------------------- -->
				<!-- start chef section---------------------------------------------------- -->

				<?php
			}elseif($_GET['action_name']=='chef_edit'){ ?>


				<?php
				$title = $_GET['name'];
				$chef_result =  mysqli_query($con,"SELECT * from monal_chefs where chef_name='$title'");
				$row = mysqli_fetch_array($chef_result);
				if(mysqli_num_rows($chef_result)>0){
					?> 
					<div class = 'bg-secondary rounded h-100 '>
						<!-- chefs image -->
						<form action="ajax/backend.php" method="POST" enctype="multipart/form-data">
							<h5 class="text-danger"><i>Image should be 600px*600px.</i></h5>
							<div class = 'mb-3 mt-3'>
								<input type="hidden" name='old_image' value="<?php echo $row['chef_img'];?>">
								<input type="hidden" name='old_name' value="<?php echo $row['chef_name'];?>">
								<input name="chef_image" class = 'form-control bg-dark' type = 'file' id = 'formFile'>
							</div>
							<!-- chefs name -->
							<div class = 'form-floating mb-3'>
								<input name="chef_names" type = 'text' class = 'form-control' id = 'floatingInput'
								placeholder = 'Chef name' value="<?php echo $row['chef_name'];?>">
								<label for = 'floatingInput'>Chef Name </label>
							</div>
							<!-- position -->
							<div class = 'form-floating mb-3'>
								<input name="chef_position" type = 'text' class = 'form-control' id = 'floatingInput'
								placeholder = 'Chef position' value="<?php echo $row['chef_position'];?>">
								<label for = 'floatingInput'>Chef position </label>
							</div>
							<!-- about the chef -->
							<div class = 'form-floating'>
								<textarea name="chef_description" class = 'form-control' placeholder = 'about the chef'
								id = 'floatingTextarea' style = 'height: 70px;'><?php echo $row['chef_discription'];?></textarea>
								<label for = 'floatingTextarea'>About the chef</label>
							</div>

							<div class="form-floating">
								<img src="img/chef_img/<?php echo $row['chef_img'];?>" alt="<?php echo $edit['chef_img'];?>" class="img-fluid universal_img">
							</div>


							<div class = 'm-n2 pt-3 pb-3 float-end'>
								<button type = 'submit' name="chef_update" class = ' btn btn-outline-success m-2'>Update</button>
							</div>
						</form>
					</div>
				<?php }}
				elseif($_GET['action_name']=='sub-cat-edit'){  ?>


					<!-- start cat-sub section---------------------------------------------------- -->
					<div class = 'bg-secondary rounded h-100 '>
						<form action="ajax/backend.php" method="POST" enctype="multipart/form-data">
							<?php 
								$cat_id =$_GET['cat_id'];
								$name =$_GET['name']; 
								$sub_cat_list= mysqli_query($con,"SELECT fci.*,fc.* from food_cat_item fci,food_category fc where item_title='$name' and fc.id='$cat_id'") or die('error');
								$sub_cat=mysqli_fetch_array($sub_cat_list);


								$get_cat= mysqli_query($con,"SELECT id,cat_name from food_category") or die('error');
								?>
<input type="hidden" name="old_title" value="<?php echo $sub_cat['item_title']; ?>">
<input type="hidden" name="old_img" value="<?php echo $sub_cat['item_img']; ?>">
							<h6 class = 'mb-4'>Food Item</h6>
							<div class = 'form-floating mb-3'>
								<!-- select food category name  -->
								

								<select name ="cat_id" class = ' text-capitalize form-select' id = 'floatingSelect'
								aria-label = 'Floating label select example'>
								<option class="text-primary" selected value="<?php echo $sub_cat['id']; ?>"><?php echo $sub_cat['cat_name']; ?></option>
								<?php 
								if(mysqli_num_rows($get_cat)>0){
									while($row = mysqli_fetch_array($get_cat)){ ?>


										<option  value = '<?php echo $row['id']; ?>'><?php echo $row['cat_name']; ?>
									</option>

								<?php }}
								?>

							</select>
							<label for = 'floatingSelect'>Food Itme</label>
						</div>
						<div class = 'form-floating mb-3'>
							<input name="food_name" type = 'text' class = 'form-control' id = 'floatingInput'
							placeholder = 'Food Name' value="<?php echo $sub_cat['item_title']; ?>">
							<label for = 'floatingInput'>Food Name </label>
						</div>
						<div class = 'form-floating mb-3'>
							<textarea id="froala1" name="food_text" class = "form-control"
							><?php echo $sub_cat['item_text']; ?></textarea>
							
						</div>
						<!-- discount % -->
						<div class = 'form-floating mb-3'>
							<input name="dis_amount" type = 'text' class = 'form-control' id = 'floatingInput'
							placeholder = 'discount amount (%)' value="<?php echo $sub_cat['dis_amount']; ?>">
							<label for = 'floatingInput'>discount amount (%)</label>
						</div>
						<!-- amount -->
						<div class = 'form-floating mb-3'>
							<input name="amount" type = 'text' class = 'form-control' id = 'floatingInput'
							placeholder = '$25..' value="<?php echo $sub_cat['amount']; ?>">
							<label for = 'floatingInput'>amount $.. </label>
						</div>
						<div class = 'mb-3 mt-3'>

							<input name="food_img" class = 'form-control bg-dark' type = 'file' id = 'formFile'>
						</div>
						<div class="form-floating">
							<img src="img/food/<?php echo $sub_cat['item_img'];?>" alt="<?php echo $sub_cat['item_img'];?>" class="img-fluid universal_img" style="width:200px;height: 200px;">
						</div>
						<div class = 'm-n2 pt-3 pb-3 float-end'>
							<button name ="food_update_submit" type = 'submit' class = ' btn btn-outline-success m-2'>Update</button>
						</div>
					</form>
					<script> 

						var editor = new FroalaEditor('#froala1');

					</script>
				</div>
				<!-- end cat-sub section---------------------------------------------------- -->


			<?php }
			else{

				echo 'action_name does not matched';
			}
			?>

		</div>
	</div>

	<?php include( 'dashboard_assest/footer.php' ); ?>