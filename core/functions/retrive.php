<?php 
function retrive_type_ads(){
	$sql="SELECT * FROM TypeAds";
	return mysql_query($sql);
}

function retrive_type_categori(){
	$sql="SELECT * FROM Categoris";
	return mysql_query($sql);
}
function retrive_all_ads(){
	$sql="SELECT * FROM lpost";
	return mysql_query($sql);
}

function retrive_commnets($id_add){
$sql="SELECT * FROM comments where lpost_id=".$id_add;
return mysql_query($sql);

}

function retrive_dropdown_select($type,$category,$sort){
	if(($type!="")&&($category!=""))
	{
		$sql="SELECT * FROM lpost where type='".$type."'";
		$sql.="and  Id_Categori='".$category."'";
	}
	else if($type!=""){
			$sql="SELECT * FROM lpost where type='".$type."'";
	}
	else if($_POST["Id_Categori"]!=""){
		$sql="SELECT * FROM lpost where Id_Categori='".$category."'";
	}
	else{
		$sql="SELECT * FROM lpost";
	}
	
	if(strcmp($sort,"ASC")==0){
		$sql.=" ORDER BY DATE ASC";
				
	}
	else{
		$sql.=" ORDER BY DATE DESC";	
	}
	
	return mysql_query($sql);
}
/*Adds for a specific user */
function retrive_user_ads($user_id){
	$sql="SELECT * FROM lpost where user_id='".$user_id."'";
	return mysql_query($sql);
}
function retrive_user_name($user_id){
	$sql="SELECT * FROM users where user_id='".$user_id."'";
	return mysql_query($sql);
}

function retrive_all_user_name(){
	$sql="SELECT * FROM users where type=0";
	return mysql_query($sql);
}

?>