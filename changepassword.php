<?php
include 'core/init.php';
protect_page();

if (empty($_POST) === false) {
    $required_fields = array('current_password', 'password', 'password_again');
    foreach ($_POST as $key => $value) {
        if (empty($value) && in_array($key, $required_fields) === true) {
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
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<nav class="navbar">
    <a href="home.php" class="homeNavButton">
        <img src="style/people-logo.png" class="navImg"/>
        <?php echo '<p class="navText">' . $user_data['username'] . '</p>' ?>
    </a>
    <a href="logout.php" class="navButton navText">Log Out</a>
    <a href="changepassword.php" class="navButton navText">Change password</a>
    <!--<a href="<?php echo $user_data['username']; ?>" class="navButton">Profile</a>-->
    <a href="lost.php" class="homeNavButton navText">Home</a>
</nav>

<div class="container">
    <div class="changePass">
        <h1 class="title"> Change your password</h1>

        <?php
        if (isset($_GET['success']) && empty($_GET['success'])){
            echo 'Youre password has been changed!';
        } else {
        if (empty($_POST) === false && empty($errors) === true) {
            change_password($session_user_id, $_POST['password']);
            header('Location: changepassword.php?success');
        } else if (empty($errors) === false) {
            foreach( $errors as $error){
                echo  '<p class="error">'.$error. '</p>';
            }
        }
        ?>
        <form action="" method="post">
            <ul class="changePassUl">
                <li class="changePassLi">
                    <input type="password" name="current_password" placeholder="Curent password" class="changePassInput">
                </li>
                <li class="changePassLi">
                    <input type="password" name="password" placeholder="New password" class="changePassInput">
                </li>
                <li class="changePassLi">
                    <input type="password" name="password_again" placeholder="Confirm password:" class="changePassInput">
                </li>
                <li class="changePassLi">
                    <input type="submit" value="Change password" class="changePassButton">
                </li>
            </ul>
        </form>
    </div>
</div>
<?php
}
?>
</body>
</html>