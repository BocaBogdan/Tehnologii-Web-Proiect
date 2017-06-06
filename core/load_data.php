<?php
include 'init.php';
	
$result=retrive_dropdown_select($_POST['Id_Ads'],$_POST['Id_City'],$_POST['Id_Categori'],$_POST['date']);
echo simple_fill($result,$user_data['user_id']);

?>