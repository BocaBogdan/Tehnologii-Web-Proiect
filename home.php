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
	<div>
		viata mea
		<?php
			if (logged_in() === true) {
				include 'includes/widgets/loggedin.php';
			}else{
				header('Location: index.php');
			}
		?>
		<a href = "logout.php">Log Out</a>
		<a href = "changepassword.php">Change password</a>
	<div>
</nav>
</body>
</html>