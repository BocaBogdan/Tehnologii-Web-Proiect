<!DOCTYPE html>
<?php 
include 'core/init.php';
?>
<html lang="en">
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
        Lost & Found
    </header>
    <form class="footer" action="login.php" method="POST">
        <br>
        <input class="input" type="text" placeholder="User" name="user_name"></input>
        <br>
        <input class="input" type="password" placeholder="Password" name="password" ></input>
        <br>
        <button type="submit" value="Log in" class="button">Login</button>
        <!--<button class="facebook">Login with Facebook</button>-->
    </form>
	<a href="SignUp.php"><button class="button signup">SignUp</button></a>
</div>
</body>
</html>