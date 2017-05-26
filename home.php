<?php
include 'core/init.php';
protect_page();
$query = "select * from `lpost` where id =". $user_data['user_id'] ;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<nav class="navbar">
    <a href="home.php" class="homeNavButton">
        <img src="style/people-logo.png" class="navImg"/>
        <?php echo '<p class="navText">' . $user_data['username'] . '</p>' ?>
    </a>
    <?php
    if (logged_in() === true) {
        include 'includes/widgets/loggedin.php';
    } else {
        header('Location: index.php');
    }
    ?>
    <a href="logout.php" class="navButton navText">Log Out</a>
    <a href="changepassword.php" class="navButton navText">Change password</a>
    <!--<a href="<?php echo $user_data['username']; ?>" class="navButton">Profile</a>-->
    <a href="lost.php" class="homeNavButton navText">Home</a>
</nav>
<div class="container">
</div>
</body>
</html>