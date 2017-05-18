<?php
function logged_in_redirect() {
	if (logged_in() === true) {
		header('Location: home.php');
		exit();
	}
}

function protect_page() {
	if (logged_in() === false) {
		header('Location: protected.php');
		exit();
	}
}

function admin_protect() {
	global $user_data;
	if (has_access($user_data['user_id']) === false ){
	header('Location: index.php');
	exit();
	}
}

function array_sanitize(&$item) {
	$item = mysql_real_escape_string($item);
}
  
function sanitize($data){
	return mysql_real_escape_string($data);	
}

function output_errors($errors) {
	$output = array();
	foreach($errors as $error) {
		$output[] = '<li>' . $error . '</li>';
	}
	return '<ul>' . implode('', $output) . '</ul>';
}
?>