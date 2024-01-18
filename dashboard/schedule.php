
<div class = 'accordion-item bg-transparent'>
	<h2 class = 'accordion-header' id = 'flush-headingThree'>
		<button class = 'accordion-button collapsed' type = 'button'
		data-bs-toggle = 'collapse' data-bs-target = '#flush-collapseThree'
		aria-expanded = 'false' aria-controls = 'flush-collapseThree'>
		<img class = 'rounded-circle' src = 'img/logo.png' alt = '' style = 'width: 40px; height: 40px; border:.5px solid ;   outline: rgba(255, 0, 0, 0.3) solid 5px;'>
		<span style = 'margin-left:10px; text-transform:uppercase;'>Monal Schedule</span>

	</button>
</h2>

</div>







<div id = 'flush-collapseThree' class = 'accordion-collapse collapse'
aria-labelledby = 'flush-headingThree' data-bs-parent = '#accordionFlushExample'>
<div class = 'accordion-body'>
	<!-- monal time schudule -->
	<form action="ajax/backend.php" method="POST">
		<!-- monday -->
		<?php $result = mysqli_query($con,"SELECT * from monal_schedule");
		while($row = mysqli_fetch_array($result))
		{
			?>

			<div class = 'input-group mb-3 '> 
				<span class = 'input-group-text bg-primary text-white' style = 'width:120px;'><?php  echo $row['open_day']; ?>
					
				</span>
				<input type="hidden" name="id" value="<?php  echo $row['id']; ?>">
				<input name ="start" type = 'text' class = 'form-control' placeholder = 'Start' aria-label = 'Username' value="<?php echo $row['time_start']; ?>">
				<span class = 'input-group-text'>To</span>
				<input name ="close" type = 'text' class = 'form-control ' placeholder = 'Close' aria-label = 'Server' style = 'margin-right:7px;' value="<?php echo $row['time_close']; ?>">
				<div class = 'form-check form-switch '>
					<input name="check" class = 'form-check form-switch form-check-input ' type = 'checkbox' role = 'switch'
					id = 'flexSwitchCheckChecked' <?php echo ($row['open_closed']>0) ? 'checked' :''; ?> >
				</div>
			</div>


		<?php } ?>

		<div class = 'm-n2 pt-3 pb-3 float-end'>
			<button type = 'submit' name='schedule_submit' class = ' btn btn-outline-success m-2'>Update</button>
		</div>
	</form>
</div>
</div>