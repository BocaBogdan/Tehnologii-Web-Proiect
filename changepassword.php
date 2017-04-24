<?php
include 'core/init.php';
protect_page();

	if (empty($_POST) === false) {
		$required_fields = array('current_password', 'password', 'password_again');
			foreach($_POST as $key=>$value) {
				if (empty($value) && in_array($key, $required_fields) === true){
					$errors[] = 'Fields are required';
					break 1;
				}
			}
			
			if (md5($_POST['current_password']) === $user_data['password']) {
				if (trim($_POST['password']) !== trim($_POST['password_again'])) {
					$errors[] = 'Your new password do not match';
				} else if (strlen($_POST['password']) < 6) {
					$errors[] = 'Your password must be at least 8 characters';
				}
			} else {
				$errors[] = 'You current password is incorrect';
			}
	}


?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Index
    </title>
	<meta charset="UTF-8">
    <!--<link rel="stylesheet" href="style/style.css">-->
</head>
<body>
	<h1> Change your password</h1>
	
	<?php 
if (isset($_GET['success']) && empty($_GET['success'])){
		echo 'Youre password has been changed!';
} else {
		if(empty($_POST) === false && empty($errors) === true) {
			change_password($session_user_id, $_POST['password']);
			header('Location: changepassword.php?success');
		} else if (empty($errors) === false) {
			echo output_errors($errors);
		}
	?>
	
<form action="" method="post">
	<ul>
		<li>
			Curent password: </br>
			<input type="password" name="current_password">
		</li>
		<li>
			New password: </br>
			<input type="password" name="password">
		</li>
		<li>
			Confirm password: </br>
			<input type="password" name="password_again">
		</li>
		<li>
			<input type="submit" value="Change password">
		</li>
	</ul>
</form>
<?php
}
?>
</body>
</html>