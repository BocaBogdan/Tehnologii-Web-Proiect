<div>
	<?php 
	if (has_access($session_user_id) === true) {
		echo '<a href="admin.php" class="homeNavButton navText">Admin page</a>';
	}
	?>
</div>