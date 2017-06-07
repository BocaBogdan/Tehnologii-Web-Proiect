<?php 
function retrive_type_ads(){
	$sql="SELECT * FROM TypeAds";
	return mysql_query($sql);
}
function retrive_city_ads(){
	$sql="SELECT * FROM Cities";
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

function retrive_dropdown_select($type,$city,$category,$sort){
	if(($type!="")&&($category!="")&&($city!=""))
	{
		$sql="SELECT * FROM lpost where type='".$type."'";
		$sql.="and  Id_City='".$city."'";
		$sql.="and  Id_Categori='".$category."'";
	}
	else if(($type!="")&&($category!="")){
			$sql="SELECT * FROM lpost where type='".$type."'";
			$sql.="and  Id_Categori='".$category."'";
	}
	else if(($category!="")&&($city!="")){
		$sql="SELECT * FROM lpost where Id_Categori='".$category."'";
		$sql.="and  Id_City='".$city."'";
	}
	else if(($type!="")&&($city!="")){
			$sql="SELECT * FROM lpost where type='".$type."'";
			$sql.="and  Id_City='".$city."'";
	}
	
	else if($type!=""){
			$sql="SELECT * FROM lpost where type='".$type."'";
		}
	else if($city!=""){
			$sql="SELECT * FROM lpost where Id_City='".$city."'";
		}
	else if($category!=""){
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

function retrive_city_add($id_city){
	$sql="SELECT * FROM cities where Id_City='".$id_city."'";
	return mysql_query($sql);
}
<<<<<<< HEAD
=======
function retrive_check_report($id_add,$id_user){
	$sql="SELECT count(*) FROM reports where Id_Add='".$id_add."' and user_id='".$id_user."'";
	return mysql_query($sql);
}
>>>>>>> dbad864cbd26c9a09f58fcb74aa04cf05400fa5c
function retrive_check_is_ban($id_user){
	$sql="SELECT count(*) FROM users where user_id='$id_user' and active=0";
	return mysql_query($sql);
}
?>