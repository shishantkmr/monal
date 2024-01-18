<?php  



include('../link.php');

// main view create
if(isset($_POST['main_view'])){
	// var_dump('expression'); die();
	
	$monal_id = 171;
	$title = $_POST['title'];
	$text = $_POST['text'];
	$url = $_POST['url'];
	$file = $_FILES['img']['name'];// get image name
	$tempname =$_FILES['img']['tmp_name'];// image local file path
	$image_name = pathinfo($file,PATHINFO_FILENAME);
	$image_ext = pathinfo($file, PATHINFO_EXTENSION);
	// var_dump($image_name.'-'.$image_ext);
	$image_new_name = '../img/main_view/'.date('h-i-s').'.'.$image_ext;
	$image_new_name_db = date('h-i-s').'.'.$image_ext;
	
	if($image_ext=='jpg' or $image_ext == 'jpeg' or $image_ext == 'png')
	{
		move_uploaded_file($tempname, $image_new_name);
		$resault = mysqli_query($con, "INSERT INTO monal_main_view SET monal_id ='$monal_id',title = '$title', monal_text = '$text',url= '$url', img =  '$image_new_name_db', created_at = now()");
		$message = "Post has been Posted ";
		echo " <script> window.location.href='../post_menu.php?message=$message';</script>";
	}
	else{
		$message_error = "Your Image not Jpg or Png";
		echo " <script> window.location.href='../post_menu.php?message_error=$message_error';</script>";
	}

}



// category
if(isset($_POST['cat_submit'])){ 
	$id_data = date('Ymdhis');
	$monal_id = 171;
	$cat = $_POST['cat_name'];

	$newTag = str_replace(' ', '-', trim($cat));

	$cat_text = $_POST['cat_text'];
	$result = mysqli_query($con, "INSERT into food_category set monal_id = '$monal_id',id_data ='$id_data',cat ='$newTag',cat_name = '$cat',cat_text = '$cat_text',created_at= now() ");
	$message = "Post has been Posted >>";
	echo " <script> window.location.href='../category.php?message=$message';</script>";
	exit;

}
// food posting
if(isset($_POST['food_submit'])){

  $filename = $_FILES["food_img"]["name"]; //get file name from local disk

    $tempname = $_FILES["food_img"]["tmp_name"]; //get image location to take ("C:\xampp\tmp\phpAE1B.tmp")

  // $clean_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename); //also it's give only file name
    $filename_without_ext = pathinfo($filename, PATHINFO_FILENAME);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

//add some line behind the image name
    $uniquefilename =  $filename_without_ext."_".date("h-i-s");


    if($extension=='jpg'|| $extension=='png'||$extension=='jpeg'|| $extension=='avif'||$extension=='webp'){
 $folder = "../img/food/" . $uniquefilename.'.'.$extension; //img going to store in this folder

 $cat_id = $_POST['cat_id'];
 $food_name = $_POST['food_name'];
 $food_text = $_POST['food_text'];
 $dis_amount = $_POST['dis_amount'];
 $amount = $_POST['amount'];



 $food_img = $uniquefilename.'.'.$extension;

 $food_store = mysqli_query($con,"INSERT into food_cat_item set cat_id = '$cat_id', item_title = '$food_name', item_text = '$food_text', dis_amount = '$dis_amount',amount = '$amount', item_img = '$food_img', created_at = now()") or die('error');

 if($food_store ){
 	if (move_uploaded_file($tempname, $folder)) {
 		$message = "Post has been Posted >>";
 		echo " <script> window.location.href='../post_menu.php?message=$message';</script>";
 	} else {
 		$message_error = "Image not uploaded>>";
 		echo " <script> window.location.href='../post_menu.php?message_error=$message_error';</script>";
 	}

 	exit();
 }}
 else{
 	$message_error = "Your Image not Jpg or Png";
 	echo " <script> window.location.href='../post_menu.php?message_error=$message_error';</script>";
 }

}
//event moment
if(isset($_POST['event_submit'])){
	$monal_id =171;
	$event_title = $_POST['event_title'];
	$event_text = $_POST['event_text'];
	$amount = $_POST['amount'];
	
$img_name =$_FILES['event_img']['name']; // img full name
$img_local_path = $_FILES['event_img']['tmp_name']; //local file path
$img_name_only = pathinfo($img_name,PATHINFO_FILENAME);
$img_name_extention = pathinfo($img_name, PATHINFO_EXTENSION);
$file_unique_name = $img_name_only.'-'.date('h-i-s').'.'.$img_name_extention;
$server_path = '../img/event/'.$file_unique_name;// add image name bcoz inside folder need img file name
if($img_name_extention=='jpg'|| $img_name_extention=='png'||$img_name_extention=='jpeg'){
move_uploaded_file($img_local_path,$server_path);//move_uploaded_file($from,$to)
mysqli_query($con,"INSERT into monal_moments set monal_id='$monal_id',moment_title = '$event_title',moment_text = '$event_text', amount = '$amount',monal_img = '$file_unique_name', created_at = now()");
$message = "Post has been Posted >>";
echo " <script> window.location.href='../post_menu.php?message=$message';</script>";
unset($img_local_path);
}else{
	$message_error = "Your Image not Jpg or Png";
	echo " <script> window.location.href='../post_menu.php?message_error=$message_error';</script>";
}}
// chef post
if(isset($_POST['chef_create'])){
	$monal_id = 171;
	$file = $_FILES['chef_image']['name'];// get image name
	$tempname =$_FILES['chef_image']['tmp_name'];// image local file path
	$image_name = pathinfo($file,PATHINFO_FILENAME);
	$image_ext = pathinfo($file, PATHINFO_EXTENSION);
	// var_dump($image_name.'-'.$image_ext);
	$image_new_name = '../img/chef_img/'.date('h-i-s').'.'.$image_ext;
	$chef_img_db = date('h-i-s').'.'.$image_ext;
	$chef_name = $_POST['chef_name'];
	$chef_post = $_POST['chef_position'];
	$chef_dsc = $_POST['chef_description'];
	if($image_ext=='jpg' or $image_ext == 'jpeg' or $image_ext == 'png')
	{
		move_uploaded_file($tempname, $image_new_name);
		$resault = mysqli_query($con, "INSERT INTO monal_chefs SET monal_id ='$monal_id',chef_name = '$chef_name', chef_position = '$chef_post', chef_discription =  '$chef_dsc', chef_img = '$chef_img_db' , created_at = now()");
		$message = "Post has been Posted ";
		echo " <script> window.location.href='../post_menu.php?message=$message';</script>";
		unset($tempname);// stop to re-uplaod when page refresh
	}
	else{
		$message_error = "Your Image not Jpg or Png";
		echo " <script> window.location.href='../post_menu.php?message_error=$message_error';</script>";
	}
}
// monal gallary
if(isset($_POST['gallary_create']))
{
	$monal_id = 171;
	$extension = array("JPG","jpg","jpeg","png","avif","webp");
	foreach($_FILES['multi_img']['tmp_name'] as $key=> $tmp_name)
 	// foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
	{
		echo $img_name = $_FILES['multi_img']['name'][$key];
		echo $img_path = $_FILES['multi_img']['tmp_name'][$key];
		echo $img_ext = pathinfo($img_name, PATHINFO_EXTENSION); die();

		if(in_array($img_ext, $extension))
		{
			if(!file_exists('../img/monal_gallary/'.$img_name))
			{
				move_uploaded_file($img_path, '../img/monal_gallary/'.$img_name);
				mysqli_query($con, "INSERT INTO monal_gallary SET monal_id = '$monal_id',img_name = '$img_name', created_at = now()");
				$message = "Post has been Posted ";
				echo " <script> window.location.href='../post_menu.php?message=$message';</script>"; 
			}
			else{
				$message_error = "This image already uploaded";
				echo " <script> window.location.href='../post_menu.php?message_error=$message_error';</script>"; 
			}
		}
		else{
			$message_error = "Your Image not Jpg or Png";
			echo " <script> window.location.href='../post_menu.php?message_error=$message_error';</script>";
		}

	}
}
// schedule
if(isset($_POST['schedule_submit']))
{	
	$id = $_POST['id'];
	$start = $_POST['start'];
	$close = $_POST['close'];
	$check = $_POST['check'];

	echo $id;
// $tue = 'Tuesday';
// $tue_s = $_POST['tue_start'];
// $tue_cl = $_POST['tue_close'];
// $tue_ch = $_POST['tue_check'];

// $wed = 'wednesday';
// $wed_s =  $_POST['wed_start'];
// $wed_cl = $_POST['wed_close'];
// $wed_ch = $_POST['wed_check'];

// $th = 'thursday';
// $th_s =  $_POST['th_start'];
// $th_cl = $_POST['th_close'];
// $th_ch = $_POST['th_check'];

// $fri = 'Friday';
// $fri_s =  $_POST['fri_start'];
// $fri_cl = $_POST['fri_close'];
// $fri_ch = $_POST['fri_check'];

// $sat = 'Saturday';
// $sat_s =  $_POST['sat_start'];
// $sat_cl = $_POST['sat_close'];
// $sat_ch = $_POST['sat_check'];

// $sun = 'Sunday';
// $sun_s =  $_POST['Sun_start'];
// $sun_cl = $_POST['Sun_close'];
// $sun_ch = $_POST['Sun_check'];

}

if(isset($_POST['messages'])){
	$results = mysqli_query($con,"SELECT * from monal_reserve order by id desc");
	$data='';
	$counts = mysqli_num_rows($results);
	$i=0;
	foreach ($results as $rows)
	{
		$data.=" <a  href='reserve_message.php?id=".$rows['customer_name']."'><div class='post_link d-flex align-items-center border-bottom py-3'>
		<img class='rounded-circle flex-shrink-0' src='img/logo.png' alt='' style='width: 40px; height: 40px; border:1px solid red;'>
		<div class='w-100 ms-3'>
		<div class='d-flex w-100 justify-content-between'>
		";
		if($rows['user_click']==''){
			$data.=" <h6 class='mb-0 text-danger text-capitalize'>".$rows['customer_name']."</h6>
			</div><small style='font-size:12px'>";

			$date = new DateTime($rows['created_at']);
			$now = new DateTime("now");
			if($now->diff($date)->format("%y")!=='0'){
				$data.= $now->diff($date)->format("%y year %m month %d day %h hours and %i minutes ago");
			}
			elseif($now->diff($date)->format("%m")!=='0'){
				$data.= $now->diff($date)->format(" %m month %d day %h hours and %i minutes ago");
			}
			elseif($now->diff($date)->format("%d")!=='0'){
				$data.= $now->diff($date)->format("%d days %h hours and %i minutes ago");
			}
			elseif($now->diff($date)->format("%h")!=='0'){
				$data.= $now->diff($date)->format(" %h hour %i minutes ago");
			}
			else{
				$data.= $now->diff($date)->format(" %i minutes ago");
			}


			$data.="</small></br>
			<span class='text-danger '>";

			$data.=$rows['customer_message']."</span>";
		}
		else{
			$data.="<h6 class='mb-0 text-white text-capitalize'>".$rows['customer_name']."</h6>
			</div><small>";
			$date = new DateTime($rows['created_at']);
			$now = new DateTime("now");
			if($now->diff($date)->format("%y")!=='0'){
				$data.= $now->diff($date)->format("%y year %m month %d day %h hours and %i minutes ago");
			}
			elseif($now->diff($date)->format("%m")!=='0'){
				$data.= $now->diff($date)->format(" %m month %d day %h hours and %i minutes ago");
			}
			elseif($now->diff($date)->format("%d")!=='0'){
				$data.= $now->diff($date)->format("%d days %h hours and %i minutes ago");
			}
			elseif($now->diff($date)->format("%h")!=='0'){
				$data.= $now->diff($date)->format(" %h hour %i minutes ago");
			}
			else{
				$data.= $now->diff($date)->format(" %i minutes ago");
			}


			$data.="</small></br><span class='text-white '>".$rows['customer_message']."</span>";
		}

		$data.= "  </div>
		</div></a>";
	}

	echo $data;
}

//-- -------------------------------edit page-----------------------------------
if(isset($_POST['cat_update_submit'])){
	$cat= $_POST['cat'];
	$cat_name = $_POST['cat_name'];

	$newTag = str_replace(' ', '-', trim($cat_name));

	$cat_text = $_POST['cat_text'];
	$result = mysqli_query($con, "UPDATE  food_category set cat ='$newTag',cat_name = '$cat_name',cat_text = '$cat_text' where cat ='$cat'");
	$message = "Post has been Updated >>";
	echo " <script> window.location.href='../post_edit.php?message=$message&name=$newTag&action_name=category';</script>";
	exit;
}
// -----------------------------------event update post------------------------
//event moment
if(isset($_POST['event_update_submit'])){
	

	$old_title = $_POST['old_title'];
	$old_image = $_POST['old_image'];
	// var_dump($old_title.'</br>'.$old_image);die();
	$event_title = $_POST['event_title'];
	$event_text = $_POST['event_text'];
	$amount = $_POST['amount'];
	
$img_name =$_FILES['event_img']['name']; // img full name
$img_local_path = $_FILES['event_img']['tmp_name']; //local file path
$img_name_only = pathinfo($img_name,PATHINFO_FILENAME);
$img_name_extention = pathinfo($img_name, PATHINFO_EXTENSION);
$file_unique_name = $img_name_only.'-'.date('h-i-s').'.'.$img_name_extention;
$server_path = '../img/event/'.$file_unique_name;// add image name bcoz inside folder need img file name

if(!empty($img_name)){ //if user selected image

	if($img_name_extention=='jpg' || $img_name_extention=='png'||$img_name_extention=='jpeg'){
move_uploaded_file($img_local_path,$server_path);//move_uploaded_file($from,$to)

unlink('../img/event/'.$old_image);
	// delete old pic from the folder

mysqli_query($con,"UPDATE  monal_moments set moment_title = '$event_title',moment_text = '$event_text', amount = '$amount',monal_img = '$file_unique_name' where moment_title = '$old_title'");
$message = "Post has been Posted >>";
echo " <script> window.location.href='../post_edit.php?message=$message&name=$event_title&action_name=event_edit';</script>";
unset($img_local_path);
}else{
	$message_error = "Your Image not Jpg or Png";
	echo " <script> window.location.href='../post_edit.php?message_error=$message_error&name=$event_title?>&action_name=event_edit';</script>";
}

}else{ //if user not select image
	mysqli_query($con,"UPDATE  monal_moments set moment_title = '$event_title',moment_text = '$event_text', amount = '$amount' where moment_title = '$old_title'");
	$message = "Post has been Posted >>";
	echo " <script> window.location.href='../post_edit.php?message=$message&name=$event_title&action_name=event_edit';</script>";
}

}

// -----------------------------------main page update post------------------------


// main view page update  

if(isset($_POST['main_view_update'])){
	$old_title =$_POST['old_title'];
	$old_img = $_POST['old_image'];

	// var_dump($old_imgs); die();
	// $old_image
	
	$title = $_POST['title'];
	$text = $_POST['text'];
	$url = $_POST['url'];
	$file = $_FILES['img']['name'];// get image name
	$tempname =$_FILES['img']['tmp_name'];// image local file path
	$image_name = pathinfo($file,PATHINFO_FILENAME);
	$image_ext = pathinfo($file, PATHINFO_EXTENSION);
	// var_dump($image_name.'-'.$image_ext);
	$image_new_name = '../img/main_view/'.date('h-i-s').'.'.$image_ext;
	$image_new_name_db = date('h-i-s').'.'.$image_ext;
	
	if(!empty($file)){
		if($image_ext=='jpg' or $image_ext == 'jpeg' or $image_ext == 'png' or $image_ext == 'avif')
		{
			unlink('../img/main_view/'.$old_img);
			move_uploaded_file($tempname, $image_new_name); 
			$resault = mysqli_query($con, "UPDATE monal_main_view SET title = '$title', monal_text = '$text',url= '$url', img =  '$image_new_name_db' where title='$old_title'");
			$message = "Post has been Updated ";
			echo " <script> window.location.href='../post_edit.php?message=$message&name=$title&action_name=mainpage_edit';</script>";
		unset($_FILES['img']); // stop to upload file when page refresh
		exit();
	}
	else{
		$message_error = "Your Image not Jpg or Png";
		echo " <script> window.location.href='../post_edit.php?message_error=$message_error&name=$title&action_name=mainpage_edit';</script>";
	}}
	else{
		$resault = mysqli_query($con, "UPDATE monal_main_view SET title = '$title', monal_text = '$text',url= '$url'  where title='$old_title'");

		$message = "Post has been Updated ";
		echo " <script> window.location.href='../post_edit.php?message=$message&name=$title&action_name=mainpage_edit';</script>";
		
		exit();
	}
}
if(isset($_POST['chef_update']))
{
	$old_img =$_POST['old_image'];
	 $old_name =$_POST['old_name']; 
	$file = $_FILES['chef_image']['name'];// get image name
	$tempname =$_FILES['chef_image']['tmp_name'];// image local file path
	$image_name = pathinfo($file,PATHINFO_FILENAME);
	$image_ext = pathinfo($file, PATHINFO_EXTENSION);
	// var_dump($image_name.'-'.$image_ext);
	$image_new_name = '../img/chef_img/'.date('h-i-s').'.'.$image_ext;
	$chef_img_db = date('h-i-s').'.'.$image_ext;
	 $chef_name = $_POST['chef_names'];
	 $chef_post = $_POST['chef_position'];
	 $chef_dsc = $_POST['chef_description'];
	// die();
	if(!empty($file)){
		if($image_ext=='jpg' or $image_ext == 'jpeg' or $image_ext == 'png' or $image_ext == 'avif')
		{
			unlink('../img/chef_img/'.$old_img);
			move_uploaded_file($tempname, $image_new_name);
			$resault = mysqli_query($con, "UPDATE  monal_chefs SET chef_name = '$chef_name', chef_position = '$chef_post', chef_discription =  '$chef_dsc', chef_img = '$chef_img_db' where chef_name='$old_name'");
			$message = "Post has been Update ";
			echo " <script> window.location.href='../post_edit.php?message=$message&name=$chef_name&action_name=chef_edit';</script>";
		unset($tempname);// stop to re-uplaod when page refresh
	}
	else{
		$message_error = "Your Image not Jpg or Png";
		echo " <script> window.location.href='../post_edit.php?message_error=$message_error&name=$chef_name&action_name=chef_edit';</script>";
	}
}else{

	$resault = mysqli_query($con, "UPDATE monal_chefs SET chef_name = '$chef_name', chef_position = '$chef_post', chef_discription =  '$chef_dsc' where chef_name='$old_name'");
	$message = "Post has been update ";
	echo " <script> window.location.href='../post_edit.php?message=$message&name=$chef_name&action_name=chef_edit';</script>";
	

}
}
// -----------------------------------food update------------------------
if(isset($_POST['food_update_submit']))
{
 $old_title =$_POST['old_title'];
 $old_img =$_POST['old_img'];
 $filename = $_FILES["food_img"]["name"]; //get file name from local disk

    $tempname = $_FILES["food_img"]["tmp_name"]; //get image location to take ("C:\xampp\tmp\phpAE1B.tmp")

  // $clean_name = preg_replace('/\\.[^.\\s]{3,4}$/', '', $filename); //also it's give only file name
    $filename_without_ext = pathinfo($filename, PATHINFO_FILENAME);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

//add some line behind the image name
    $uniquefilename =  $filename_without_ext."_".date("h-i-s");


 $folder = "../img/food/" . $uniquefilename.'.'.$extension; //img going to store in this folder

 $cat_id = $_POST['cat_id'];
 $food_name = $_POST['food_name'];
 $food_text = $_POST['food_text'];
 $dis_amount = $_POST['dis_amount'];
 $amount = $_POST['amount'];



 $food_img = $uniquefilename.'.'.$extension;
if(!empty($filename)){
    if($extension=='jpg'|| $extension=='png'||$extension=='jpeg'|| $extension=='avif'||$extension=='webp'){
unlink('../img/food/'.$old_img);
 move_uploaded_file($tempname, $folder);
  mysqli_query($con,"UPDATE food_cat_item set cat_id = '$cat_id', item_title = '$food_name', item_text = '$food_text', dis_amount = '$dis_amount',amount = '$amount', item_img = '$food_img' where item_title='$old_title'") or die('error');

 		$message = "Post has been Posted >>";
 		echo " <script> window.location.href='../post_edit.php?message=$message&name=$food_name&action_name=sub-cat-edit&cat_id=$cat_id';</script>";

 	} 
 else{
 	$message_error = "Your Image not Jpg or Png";
 	echo " <script> window.location.href='../post_edit.php?message_error=$message_error&name=$food_name&action_name=sub-cat-edit&cat_id=$cat_id';</script>";
 }
 	}
 	else{
  mysqli_query($con,"UPDATE food_cat_item set cat_id = '$cat_id', item_title = '$food_name', item_text = '$food_text', dis_amount = '$dis_amount',amount = '$amount' WHERE item_title='$old_title'") or die('error');
 		
 		$message = "Post has been Posted >>";
 		echo " <script> window.location.href='../post_edit.php?message=$message&name=$food_name&action_name=sub-cat-edit&cat_id=$cat_id';</script>";

 	}

 	exit();
 }



// -----------------------------------food update end------------------------




// -----------------------------------deletee post------------------------
// -----------------------------------deletee post------------------------------
// -----------------------------------deletee post------------------------------
// -----------------------------------deletee post------------------------------
// -----------------------------------deletee post------------------------------
// -----------------------------------deletee post------------------------------
// -----------------------------------deletee post------------------------------
// -----------------------------------deletee post------------------------------



if(isset($_GET['action_name'])){

	if($_GET['action_name']=='cat_delete'){
		$cat = $_GET['name'];

		$query =mysqli_query($con,"SELECT * from food_category where cat = '$cat'");
		$result = mysqli_fetch_assoc($query);

		$id = $result['id'];
		$get_item_list = mysqli_query($con,"SELECT item_img,id from food_cat_item where cat_id='$id'");

		foreach($get_item_list as $row)
		{

			unlink('../img/food/'.$row['item_img']);
			$delete_cat_item =mysqli_query($con,"DELETE from food_cat_item where cat_id = '$id'");
		}

		$delete_cat =mysqli_query($con,"DELETE from food_category where id = '$id'");

		$message = "Your Post has been DELETED >>";
		echo " <script> window.location.href='../post_list.php?message=$message';</script>";
		exit();
	}}

	if(isset($_GET['action_name'])){
		if($_GET['action_name']=='event_delete'){
			 $img = $_GET['img'];
			 $moment_title = $_GET['name'];

			unlink('../img/event/'.$img);
			$delete_monal_event = mysqli_query($con, "DELETE from monal_moments where moment_title = '$moment_title' ");

			$message = "Your Post has been DELETED >>";
			echo " <script> window.location.href='../post_list.php?message=$message';</script>";
			exit();
		}}
// chef section delete-----------------------------------------------------------------

		if(isset($_GET['action_name'])){
		if($_GET['action_name']=='chef_delete'){
			
			 $img = $_GET['img'];
			 $chef_name = $_GET['name'];

			unlink('../img/chef_img/'.$img);
			$delete_monal_event = mysqli_query($con, "DELETE from monal_chefs where chef_name = '$chef_name' ");

			$message = "Your Post has been DELETED >>";
			echo " <script> window.location.href='../post_list.php?message=$message';</script>";
			exit();
		}}
// gallary section delete-----------------------------------------------------------------
if(isset($_GET['action_name'])){
		if($_GET['action_name']=='gallary_img_delete'){
			 $img = $_GET['img'];
			unlink('../img/monal_gallary/'.$img);
			$delete_monal_gallary = mysqli_query($con, "DELETE from monal_gallary where img_name = '$img' ");

			$message = "Your Image has been DELETED >>";
			echo " <script> window.location.href='../post_list.php?message=$message';</script>";
			exit();
		}}
// sub cat section delete-----------------------------------------------------------------

		if(isset($_GET['action_name'])){
		if($_GET['action_name']=='sub-cat-Delete'){
			 $img = $_GET['img'];
			 $item_title = $_GET['name'];
			unlink('../img/food/'.$img);
			$delete_sub_cat = mysqli_query($con, "DELETE from food_cat_item where item_title = '$item_title' ");

			$message = "Your Image has been DELETED >>";
			echo " <script> window.location.href='../post_list.php?message=$message';</script>";
			exit();
		}}
	?>