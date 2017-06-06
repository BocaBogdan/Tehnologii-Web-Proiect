<?php 
function delet_comment($id_comment){
	$sql="DELETE FROM `comments` WHERE id_coment='".$id_comment."'";
	mysql_query($sql);
}

?>