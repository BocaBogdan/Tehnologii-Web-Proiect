<div>
	<h2><?php echo $user_data['username'];?></h2>
	<?php 
	if (has_access($session_user_id) === true) {
		echo 'Admin!';
		echo '<a href="admin.php">Admin page!</a>';
	}
	?>
</div>