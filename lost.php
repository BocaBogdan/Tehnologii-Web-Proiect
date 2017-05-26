<?php
include 'core/init.php';
protect_page();

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
    <a href="lPost.php" class="navButton">
        <img src="style/add.png" class="navImg"/>
        <p class="navText">Add Post</p>
    </a>
    <a href="home.php" class="navButton">
        <img src="style/people-logo.png" class="navImg"/>
        <?php echo '<p class="navText">' . $user_data['username'] . '</p>' ?>
    </a>
</nav>

<form action="" method="post" class="Selector">

    <select class="Select" name="table" >
        <option class="dropSelect" value="all">ALL</option>
        <option class="dropSelect" value="lost">LOST</option>
        <option class="dropSelect" value="found">FOUND</option>
    </select>

    <select class="Select" name="type">
        <option class="dropSelect" value="all">ALL</option>
        <option class="dropSelect" value="portofel">PORTOFEL</option>
        <option class="dropSelect" value="telefon">TELEFON</option>
        <option class="dropSelect" value="chei">CHEI</option>
        <option class="dropSelect" value="acte">ACTE</option>
        <option class="dropSelect" value="altceva">ALTCEVA</option>
    </select>

    <select class="Select" name="order">
        <option class="dropSelect" value="asc">Date Asc</option>
        <option class="dropSelect" value="desc">Date Desc</option>
        <option class="dropSelect" value="alfab">Alfabetic</option>
        <option class="dropSelect" value="dezalfab">Invers alfabetic</option>
    </select>

    <select class="Select" name="number">
        <option class="dropSelect" value="15">15</option>
        <option class="dropSelect" value="25">25</option>
        <option class="dropSelect" value="35">35</option>
        <option class="dropSelect" value="45">45</option>
    </select>
    <!--<input type="submit" class="submit"/>-->
</form>

<div class="container">
    <?php
    if (isset($_POST['table'])) {
        $select1 = $_POST['table'];
        echo  $select1 .'<BR>';
    }
    if (isset($_POST['type'])) {
        $select1 = $_POST['type'];
        echo  $select1 .'<BR>';
    }
    if (isset($_POST['order'])) {
        $select1 = $_POST['order'];
        echo  $select1 .'<BR>';
    }
    if (isset($_POST['number'])) {
        $select1 = $_POST['number'];
        echo  $select1 .'<BR>';
    }
    ?>
</div>

</body>
</html>