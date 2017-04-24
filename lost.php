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
<div>	
	<a href="home.php" class="button" >Home</a>
	<a href="lPost.php"><button class="button">Add Post!</button></a>
</div>
<?php
	//$query = "SELECT * FROM lpost";
	//while ($row = mysql_fetch_assoc(mysql_query($query))){
		echo "<div id='lospost'>";
			echo "<img src='image/".$row['image']."' >";
			echo "<p>".$row['text']."</p>";
		echo "</div>";
	
?>
	
</body>
</html>