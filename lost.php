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
	<a href="lPost.php" class="navButton">
		<img src="style/add.png" class="navImg"/>
		<p class="navText">Add Post</p>
	</a>
	<a href="home.php" class="navButton">
		<img src="style/people-logo.png" class="navImg"/>
		<?php echo '<p class="navText">'. $user_data['username'].'</p>' ?>
	</a>
</nav>

<div class="Selector">

	<select class="Select">
		<option class="dropSelect" name="all" >ALL</option>
		<option class="dropSelect" name="lost" >LOST</option>
		<option class="dropSelect" name="found" >FOUND</option>
	</select>

	<select class="Select">
		<option class="dropSelect" name="defaut">ALL</option>
		<option class="dropSelect" name="portofel">PORTOFEL</option>
		<option class="dropSelect" name="telefon">TELEFON</option>
		<option class="dropSelect" name="chei">CHEI</option>
		<option class="dropSelect" name="acte" >ACTE</option>
		<option class="dropSelect" name="altceva">ALTCEVA</option>
	</select>

	<select class="Select">
		<option class="dropSelect" name="dateAsc">Date Asc</option>
		<option class="dropSelect" name="dateDesc">Date Desc</option>
		<option class="dropSelect" name="alfabetic">Alfabetic</option>
		<option class="dropSelect" name="Inalfabetic">Invers alfabetic</option>
	</select>

	<select class="Select">
		<option class="dropSelect" name="default" >15</option>
		<option class="dropSelect" name="def25" >25</option>
		<option class="dropSelect" name="def35" >35</option>
		<option class="dropSelect" name="def45" >45</option>
	</select>

</div>

</body>
</html>