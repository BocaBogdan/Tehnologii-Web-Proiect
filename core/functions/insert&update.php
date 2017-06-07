<?php

function insert_comment($conted,$lpost_id,$user_id){
	mysql_real_escape_string(mysql_query("INSERT INTO `comments` (conted, lpost_id, user_id) VALUE ('$conted', '$lpost_id', '$user_id')"));
}

function insert_add($image,$description,$user_id){

	 mysql_real_escape_string(mysql_query("INSERT INTO `lpost` (image, description, user_id) VALUE ('$image', '$description', '$user_id')"));
}

function update_comment($id_comment,$conted){
	
	mysql_real_escape_string(mysql_query("UPDATE `comments` SET conted ='$conted' WHERE id_coment='$id_comment'"));
}
function insert_report($id_add,$id_user){
	mysql_real_escape_string(mysql_query("INSERT INTO `reports` (Id_Add,user_id) VALUE ('$id_add', '$id_user')"));
}
function disable_user($user_id){
	mysql_real_escape_string(mysql_query("UPDATE `users` SET active = 0 WHERE user_id='$user_id'"));
}
function unable_user($user_id){
	mysql_real_escape_string(mysql_query("UPDATE `users` SET active = 1 WHERE user_id='$user_id'"));
}
?>