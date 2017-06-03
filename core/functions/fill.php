
<?php
function fill_type_add($connect){
	$output='';
	$sql="SELECT * FROM TypeAds";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result)){
		$output.='<option value="'.$row["Id_Add"].'">'.$row["Type_Add"];
	}
	return $output;
}
function fill_type_categori($connect){
	$output='';
	$sql="SELECT * FROM Categoris";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result)){
		$output.='<option value="'.$row["Id_Categori"].'">'.$row["Type_Categori"];
	}
	return $output;
}

if(isset($_POST['comment'])){
	$conted = $_POST['conted'];
	global $lost_data;
	$lpost_id = $lost_data['lpost_id'];
	global $user_data;
	$user_id     = $user_data['user_id'];
	$query = mysql_real_escape_string(mysql_query("INSERT INTO `comments` (conted, lpost_id, user_id) VALUE ('$conted', '$lpost_id', '$user_id')"));
}

function fill_ads($connect,$user){
	$sql="SELECT * FROM lpost";
	$result=mysql_query($sql);
	return simple_fill($result,$user);
}

function simple_fill($result,$user){
	$output='';
	while($row=mysql_fetch_array($result)){
		$output.="<div>";
		$output.="<p>" . $row['description'] . "</p>";
		$output.="<p><img src='image/".$row['image'] ."' ".'height='.'"42"'. ' width="42"'.">"."</p>";
		$output.="<p>" . $row['lpost_id'] . "</p>";
		$output.="<form method='POST' enctype='multipart/form-data'>";
		$output.="<input type='text' name='conted'></input>";
		$output.="<input type='submit' name='comment' value='comment'>Comment</input>";
		$output.="</form>";
		$output.="</div>";
	}
	return $output;
}

?>

