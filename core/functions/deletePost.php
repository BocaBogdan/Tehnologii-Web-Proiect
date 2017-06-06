<?php 
function delete_add_post($lpost_id){
	$sql="DELETE FROM `lpost` WHERE lpost_id='".$lpost_id."'";
	mysql_query($sql);
}

?>