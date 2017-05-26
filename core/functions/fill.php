
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

function fill_ads($connect){
	$output='';
	$sql="SELECT * FROM lpost";
	$result=mysql_query($sql);
	while($row=mysql_fetch_array($result)){
$output.="<div>";
$output.="<p>" . $row['description'] . "</p>";
$output.="<p><img src='image/".$row['image'] ."' ".'height='.'"42"'. ' width="42"'.">"."</p>";
$output.="<p>" . $row['lpost_id'] . "</p>";
$output.="</div>";
	}
	return $output;
}
?>

