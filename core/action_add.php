<?php 
include 'init.php';
if(isset($_POST['Id_Commment_Delet'])!=""){
	delet_comment($_POST['Id_Commment_Delet']);
}
if(isset($_POST['Id_Post_delet'])!=""){
	delete_add_post($_POST['Id_Post_delet']);
}
if(isset($_POST['Id_Add_Report'])!=""){
	insert_report($_POST['Id_Add_Report'],$user_data['user_id']);
}
if(isset($_POST['User_Disable'])!=""){
	disable_user($_POST['User_Disable']);
}
if(isset($_POST['User_Unable'])!=""){
	unable_user($_POST['User_Unable']);
}
?>