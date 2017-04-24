<?php
include 'core/init.php';
protect_page();

	if (isset($_POST['upload'])){
		
		$imageFileType = pathinfo("image/" . basename($_FILES['image']['name']),PATHINFO_EXTENSION);
		$image = $_FILES['image']['name'];
		$description = $_POST['description'];
		
		if($description == true){
		move_uploaded_file($_FILES['image']['tmp_name'],"image/".$_FILES["image"]["name"]);
		$query = mysql_real_escape_string(mysql_query("INSERT INTO `lpost` (image, description) VALUE ('$image', '$description')"));
			
			header('Location: lost.php');
			exit();
		}
		/*if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
			$msg = "Post uploaded successfully";
		}else{
			$msg = "probleme breee";
		}*/
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
	<meta charset="UTF-8">
</head>
<body>
	<center>Insert your lost announce!</center>
	
	<div>
		<center>
			<form method="POST" enctype="multipart/form-data">
				<div>
					<input type="file" name="image">
				</div>
				<div>
					<textarea name="description" cols="40" rows="4"></textarea>
				</div>
				<button type="submit" name="upload" value="Save">Post</button>
			</form>
		</center>
	</div>
</body>
</html>