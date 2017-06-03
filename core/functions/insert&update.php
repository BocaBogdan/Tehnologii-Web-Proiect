<?php

function insert_comment($conted,$lpost_id,$user_id){
	mysql_real_escape_string(mysql_query("INSERT INTO `comments` (conted, lpost_id, user_id) VALUE ('$conted', '$lpost_id', '$user_id')"));
}

function insert_add($image,$description,$user_id){

	 mysql_real_escape_string(mysql_query("INSERT INTO `lpost` (image, description, user_id) VALUE ('$image', '$description', '$user_id')"));
}
?>