<?php 
include 'core/init.php';
logged_in_redirect();

if (empty($_POST) === false) {
	$required_fields = array('username', 'password', 'password_again', 'email');
	foreach($_POST as $key=>$value){
		if (empty($value) && in_array($key,$required_fields) === true){
			$errors[] = 'You need to complete everything';
			break 1;
		}
	}
if (empty($errors) === true) {
				if (user_exists($_POST['username']) === true) {
					$errors[] = 'Sorry, the username \'' . $_POST['username'] . '\' is already taken.';
				}
				if (preg_match("/\\s/", $_POST['username']) == true) {
					$errors[] = 'Your username must not contain any spaces.';
				}
				if (strlen($_POST['password']) < 6) {
					$errors[] = 'Your password must be at least 6 characters';
				}
				if ($_POST['password'] !== $_POST['password_again']) {
					$errors[] = 'Your passwords do not mathch';
				}
				if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
					$errors[] = 'A valid email Boss!';
				}
				if (email_exists($_POST['email']) === true) {
					$errors[] = 'Sorry, the email \'' . $_POST['email'] . '\' is already taken.';
				}
	}
}

if (isset($_GET['success']) && empty($_GET['success'])){
	echo 'You\'ve been registered  successfully!';
} else {
	if (empty($_POST) === false && empty($errors) === true) {
		$register_data = array(
			'username' => $_POST['username'],
			'password' => $_POST['password'],
			'email' => $_POST['email'],
		);
		
		register_user($register_data);
		header('Location: SignUp.php?success');
		exit();
		
	} else if (empty($errors) === false) {
			echo output_errors($errors);
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
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<div class="div">
    <header class="header">
        Sign Up
    </header>
    <form class="footer" action="" method="POST">
		<label class="labelSignUp" for="username">Insert User Name: </label> 
        <input class="input" type="text" placeholder="User" name="username"></input>
		
		<label class="labelSignUp" for="password">Type Your Password: </label> 
        <input class="input" type="password" placeholder="Password" name="password" ></input>
        
		<label class="labelSignUp" for="ConfirmPassword">Confirm Your Password: </label>
		<input class="input" type="password" placeholder="Password" name="password_again"></input>
		
		<label class="labelSignUp" for="email">Insert Your Email: </label> 
        <input class="input" type="email" placeholder="email" name="email"></input>
        <br>
        <button class="button" type="submit" value="Register">Submit</button>
        <!--<button class="facebook">Login with Facebook</button>-->
    </form>
</div>
</body>
</html>