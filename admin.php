<?php
include 'core/init.php';
include "generateR.php";
protect_page();
admin_protect();

if (isset($_POST['days'])) {
    $query = "SELECT lpost.description, typeads.Type_Add, categoris.Type_Categori, lpost.Date , cities.Name_City FROM lpost JOIN typeads ON lpost.type = typeads.Id_Add JOIN categoris ON lpost.Id_Categori =categoris.Id_Categori JOIN cities ON lpost.Id_City=cities.Id_City WHERE DATEDIFF( CURRENT_TIMESTAMP,Date) <" . $_POST['days'] . " ORDER BY 2";
    generate($query);
} else if (isset($_POST['months'])) {
    $query = "SELECT lpost.description, typeads.Type_Add, categoris.Type_Categori, lpost.Date , cities.Name_City FROM lpost JOIN typeads ON lpost.type = typeads.Id_Add JOIN categoris ON lpost.Id_Categori =categoris.Id_Categori JOIN cities ON lpost.Id_City=cities.Id_City WHERE EXTRACT(MONTH FROM CURRENT_TIMESTAMP) - EXTRACT(MONTH FROM Date ) <" . $_POST['months'] . " ORDER BY 2";
    echo $query;
    generate($query);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
<nav class="navbar">
    <a href="logout.php" class="navButton navText">Log Out</a>
    <a href="home.php" class="navButton">
        <img src="style/people-logo.png" class="navImg"/>
        <?php echo '<p class="navText">' . $user_data['username'] . '</p>' ?>
    </a>
</nav>
<div class="container">
    <form class="navText" method="POST">
        <h3> All lost anounce for lost: </h3>
        <select name="days">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
        </select>
        <p>day(s)</p>
        <input type="submit"/>
    </form>
    <a class="navText" href="generare.php"> Generate Top 5 found </a>
    <a class="navText" href="generare1.php"> Generate Top 5 lost </a>
    <form class="navText" method="POST">
        <h3> All lost anounce for lost: </h3>
        <select name="months">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
        <p>month(s)</p>
        <input type="submit"/>
    </form>
    <?php echo fill_user_list() ?>
</div>
<script type="text/javascript">
    function disable_user(show_user){
        var unique_user_id=show_user.substring(9,show_user.length);
        $.ajax({
            url:"core/action_add.php",
            method:"POST",
            data:{User_Disable:unique_user_id},
            success:function(data){
                //$('#'+show_user+'').html(data);
                $('#show_user'+unique_user_id).html(data);
                alert('#show_user'+unique_user_id);
            }
        });
    }
    function unable_user(show_user){
        var unique_user_id=show_user.substring(9,show_user.length);
        $.ajax({
            url:"core/action_add.php",
            method:"POST",
            data:{User_Unable:unique_user_id},
            success:function(data){
                $('#show_user'+unique_user_id).html(data);
                alert('#show_user'+unique_user_id);
            }
        });
    }
</script>
</body>
</html>
