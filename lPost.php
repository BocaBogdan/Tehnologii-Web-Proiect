<?php
include 'core/init.php';
protect_page();
$error = array();

if (isset($_POST['upload'])) {
    $isImage = true;
    $imageFileType = pathinfo("image/" . basename($_FILES['image']['name']), PATHINFO_EXTENSION);
    $image = $_FILES['image']['name'];
    $allowed = array('gif', 'png', 'jpg', 'jpeg');
    $type = $_POST['type'];
    $categori = $_POST['categori'];
    $user_id = $user_data['user_id'];
    $city = $_POST['city'];
    echo  $user_id;
    if (!in_array($imageFileType, $allowed)) {
        $isImage = false;
    }
    $description = $_POST['description'];
    if (($description == true) && ($isImage == true)) {
        move_uploaded_file($_FILES['image']['tmp_name'], "image/" . $_FILES["image"]["name"]);
        $query = mysql_real_escape_string(mysql_query("INSERT INTO `lpost` (image, description, type, Id_Categori,user_id, Id_City) VALUE ('$image', '$description','$type', '$categori','$user_id',' $city ' )"));
        header('Location: lost.php');
        exit();
    } else {
        echo '<h1> You need to insert a <b>image</b></h1>';
    }
}
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
<div class="container">
    <h3 class="titleInsert">Insert your lost announce!</h3>
    <form method="POST" enctype="multipart/form-data">
        <select class="selectAnounce" name="type">
            <?php echo fill_type_add($connect);?>
        </select>
        <br>
        <select class="selectAnounce" name="city">
            <?php echo fill_city_add($connect);?>
        </select>
        <br>
        <select class="selectAnounce" name="categori">
            <?php echo fill_type_categori($connect);?>
        </select>
        <br>
        <input type="file" name="image" class="inputAnounce">
        <br>
        <textarea name="description" cols="40" rows="4" class="anounceDescription"></textarea>
        <br>
        <button type="submit" name="upload" value="Save" class="buttonDescription">Post</button>
    </form>
</div>
</body>
</html>