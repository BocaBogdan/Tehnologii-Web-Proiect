<?php

function get_my_adds($user_id){
	
	$result=retrive_user_ads($user_id);
	return simple_fill($result,$user_id);
}

?>