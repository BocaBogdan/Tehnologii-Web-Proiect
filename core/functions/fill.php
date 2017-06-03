
<?php

function fill_type_add($connect){
	$output='';
	$result=retrive_type_ads();
	while($row=mysql_fetch_array($result)){
		$output.='<option value="'.$row["Id_Add"].'">'.$row["Type_Add"];
	}
	return $output;
}
function fill_type_categori($connect){
	$output='';
	$result=retrive_type_categori();
	while($row=mysql_fetch_array($result)){
		$output.='<option value="'.$row["Id_Categori"].'">'.$row["Type_Categori"];
	}
	return $output;
}


function fill_ads($connect,$user){
	$result=retrive_all_ads();
	return simple_fill($result,$user);
}

function simple_fill($result,$user){
	$output='';
	while($row=mysql_fetch_array($result)){
		$output.="<div id='element'>";
		$output.="<p>" . $row['description'] . "</p>";
		$output.="<p><img src='image/".$row['image'] ."' ".'height='.'"42"'. ' width="42"'.">"."</p>";
		$output.="<p id='id_post' value='".$row['lpost_id']."'>" . $row['lpost_id'] . "</p>";
		$output.=fill_coments(retrive_commnets($row['lpost_id']));
		$output.="<form method='POST' enctype='multipart/form-data'>";
		$output.="<input type='text' name='conted'></input>";
		$output.="<input type='hidden' name='lpost_id' value='".$row['lpost_id']."'>";
		$output.="<input type='submit' name='comment' value='Comment' id='insertComent'>Comment</input>";
		$output.="</form>";
		$output.="</div>";
	}
	return $output;
}

function fill_coments($result){
	$output='';
	$output.="<div>";
	while($row=mysql_fetch_array($result)){
		$output.="<p>".$row['conted']."</p>";
	}
	$output.="</div>";
	return $output;
}

?>

