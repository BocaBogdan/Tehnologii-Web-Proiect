<?php
session_start();

require 'database/connect.php';
require 'functions/users.php';
require 'functions/gen.php';
require 'functions/fill.php';
 
if (logged_in() === true) {
	$session_user_id = $_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'user_id', 'username', 'password', 'email', 'type');
	$lost_data = lost_data($session_user_id, 'lpost_id', 'image', 'description', 'type');
	if (user_active($user_data['username']) === false) {
		session_destroy();
		header('Location: index.php');
		exit();
	}
}

$errors = array();
?>