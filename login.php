<?php
include 'core/init.php';

if ( !empty($_POST) ) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if (empty($username)|| empty($password)) {
		$errors[] = 'You need to enter a username and password';
	} else if (!user_exists($username)) {
		$errors[] = 'We can\`t find that username!';
	} else if (user_active($username) === false){
		$errors[] = 'Youre account has been baned!';	
	} else {
		
				if (strlen($password) > 32) {
					$errors[] = 'Password to long';
				}
				
			$login = login($username,$password);
			if (!$login) {
				$errors[] = 'Ceva nu e bun la user/password';
			} else {
				$_SESSION['user_id'] = $login;
				header('Location: home.php');
				exit();
			}	
	}
}
include 'includes/LoginOver/header.php';
if (!empty($errors)) {
include 'includes/LoginOver/footer.php';
?>
		<h2>We tried to log you in, but...</h2>
<?php
echo output_errors($errors);
}
?>