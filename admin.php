<?php 
include 'core/init.php';
protect_page();
admin_protect();
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
		<a href = "logout.php" class="button" >Log Out</a>
		<a href = "changepassword.php" class="button" >Change password</a>
		<a href="lost.php" class="button">Home</a>
	</div>
</nav>

</body>
</html>