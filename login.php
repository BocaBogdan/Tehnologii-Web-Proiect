<?php
include 'core/init.php';

if (empty($_POST) === false) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if (empty($username) === true || empty($password) === true) {
		$errors[] = 'You need to enter a username and password';
	} else if (user_exists($username) === false) {
		$errors[] = 'We can\`t find that username!';
	} else{
		
				if (strlen($password) > 32) {
					$errors[] = 'Password to long';
				}
				
			$login = login($username,$password);
			if ($login === false) {
				$errors[] = 'Ceva nu e bun la user/password';
			} else {
				$_SESSION['user_id'] = $login;
				header('Location: home.php');
				exit();
			}	
	}
}
include 'includes/LoginOver/header.php';
if (empty($errors) === false) {
include 'includes/LoginOver/footer.php';
?>
		<h2>We tried to log you in, but...</h2>
<?php
echo output_errors($errors);
}
?>