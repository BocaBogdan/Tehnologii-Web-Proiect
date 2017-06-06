<?php 
function delet_comment($id_comment){
	$sql="DELETE FROM `comments` WHERE id_coment='".$id_comment."'";
	mysql_query($sql);
}

function delete_add_post($lpost_id){
	$sql="DELETE FROM `lpost` WHERE lpost_id='".$lpost_id."'";
	mysql_query($sql);
}
?>