
<?php
//include 'profile/get_all_profile_adds.php';
function fill_type_add($connect){
	$output='';
	$result=retrive_type_ads();
	while($row=mysql_fetch_array($result)){
		$output.='<option value="'.$row["Id_Add"].'">'.$row["Type_Add"];
	}
	return $output;
}
function fill_city_add(){
	$output='';
	$result=retrive_city_ads();
	while($row=mysql_fetch_array($result)){
		$output.='<option value="'.$row["Id_City"].'">'.$row["Name_City"];
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
		$output.="<div><img id='anouncePhoto' src='image/".$row['image'] ."' />";
		$output.="<p id='anounceDescription'>" . $row['description'] . "</p></div>";
		/*aici o sa contina orasul si data*/
		$output.="<p id='show_date'>".$row['Date']."</p>";
		$output.="<p id='show_city'>".fill_name_city(retrive_city_add($row['Id_City']))."</p>";
		$output.="<br><form method='POST' enctype='multipart/form-data'>";
		$output.= fill_coments(retrive_commnets($row['lpost_id']),$user);
		$output.="<input type='text' name='conted'> </input>";
		$output.="<input type='hidden' name='lpost_id' value='".$row['lpost_id']."'>";
		$output.="<input type='submit' name='comment' value='Comment' id='insertComent'> </input>";
		$output.="</form>";
		$output.="</div>";
	}
	return $output;
}

function fill_coments($result,$user){
	$output='';
	$output.="<div id='show_coments'>";
	while($row=mysql_fetch_array($result)){
		$unique_id_comment="show_coment".$row['id_coment'];
		$output.="<p id='".$unique_id_comment."'>".$row['conted']." ";
		if(chek_is_my_comment($user,$row['user_id'])){
		$output.="<img src='style/edit.png'".'height='.'"10"'. ' width="10"'." value='1' onclick='edit(".'"'.$unique_id_comment.'"'.",".'"'.$row['conted'].'"'.")'>";
		$output.="<img src='style/delet.png'".'height='.'"10"'. ' width="10"'." value='1' onclick='delet(".'"'.$unique_id_comment.'"'.")'>";
		}
		else{
		$username=fill_username(retrive_user_name($row['user_id']));
		$output.="  by: ".$username;
		}
		$output.="</p>";
	}
	$output.="</div>";
	return $output;
}

function fill_username($result){
	/*Return first(is unique)*/
	while($row=mysql_fetch_array($result)){
	return $row['username'];
	}
}
function fill_name_city($result){
	/*Return first(is unique)*/
	while($row=mysql_fetch_array($result)){
	return $row['Name_City'];
	}
}
/*Admin page */
function fill_user_list(){
	$result=retrive_all_user_name();
	$output='';
	$output.="<div id='show_users'>";
	while($row=mysql_fetch_array($result)){
		$output.="<p id='".$row['user_id']."'>".$row['username']."</p> ";
	}
	$output.="</div>";
	return $output;
}

function chek_is_my_comment($user_id_session,$user_id_comment){
	if($user_id_session==$user_id_comment) return true;
	return false;
}

?>

