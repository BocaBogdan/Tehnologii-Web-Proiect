<?php
include 'core/init.php';
protect_page();
$error=array();

	if (isset($_POST['upload'])){	
	$isImage=true;	
		$imageFileType = pathinfo("image/" . basename($_FILES['image']['name']),PATHINFO_EXTENSION);
		$image = $_FILES['image']['name'];
		$allowed= array('gif','png','jpg','jpeg');
		if(!in_array($imageFileType,$allowed)){
		$isImage=false;
		}
		if(($_POST['description'] == true)&&($isImage==true)){
		move_uploaded_file($_FILES['image']['tmp_name'],"image/".$_FILES["image"]["name"]);
		insert_add($image,$_POST['description'],$user_data['user_id']);
			header('Location: lost.php');
			exit();
		}
		else{
			echo '<h1> You need to insert a <b>image</b></h1>';
		}
			
		
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