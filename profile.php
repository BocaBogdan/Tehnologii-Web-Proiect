<?php 
include 'core/init.php';
protect_page();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Home Page</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="style/style.css">
	</head>
	<body>
	<nav class="navbar">
		<p>
			<?php
				if (logged_in() === true) {
					include 'includes/widgets/loggedin.php';
				}else{
					header('Location: index.php');
				}
			?>
		</p>
	</nav>
	<div>
	<?php
		if (isset($_GET['username']) === true && empty($_GET['username']) === false) {
			$username = $_GET['username'];
			
			if (user_exists($username) === true){
				$user_id  = user_id_from_username($username);			
				$profile_data = user_data($user_id, 'username', 'email');
	?>
		<h2><?php echo $profile_data['username']; ?>`s Profile</h2>
		<p><?php echo $profile_data['email']; ?></p>
		
	<?php	
			} else {
				echo 'User do not exists!';
			}
		} else {
		header('Location:index.php');
			exit();
		}
	?>
	</div>
	</body>
</html>