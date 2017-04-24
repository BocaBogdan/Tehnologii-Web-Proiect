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
	<div><p>Logat ca si:
		<?php
			if (logged_in() === true) {
				include 'includes/widgets/loggedin.php';
			}else{
				header('Location: index.php');
			}
		?></p>
		<a href = "logout.php" class="button" >Log Out</a>
		<a href = "changepassword.php" class="button" >Change password</a>
	<div>
</nav>
<div>
	<a href="found.php" class="button">I found!</a>
</div>
<div>
	<a href="lost.php" class="button">I Lost!</a>
</div>
</body>
</html>