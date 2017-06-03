<?php
include 'core/init.php';
protect_page();

//include 'core/functions/fill.php';
if(isset($_POST['comment'])){
	insert_comment($_POST['conted'],$_POST['lpost_id'],$user_data['user_id']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
	<title>Home Page</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
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
<div class="Selector">

	<select class="Select" name="type" id="type">
		<option class="dropSelect" value="">ALL</option>
		<?php echo fill_type_add($connect);?>
	</select>

	<select class="Select" name="categori" id="categori">
		<option class="dropSelect" value="">ALL</option>
		<?php echo fill_type_categori($connect);?>
	</select>

	<select class="Select"  name="date" id="date">
		<option class="dropSelect" value="ASC">Date Asc</option>
		<option class="dropSelect" value="DESC">Date Desc</option>
	</select>

	<select class="Select">
		<option class="dropSelect" name="default" >15</option>
		<option class="dropSelect" name="def25" >25</option>
		<option class="dropSelect" name="def35" >35</option>
		<option class="dropSelect" name="def45" >45</option>
	</select>

<div class="container" id="show_anunt">
    <div>
	<?php echo fill_ads($connect,$user_data['user_id']);?>
	</div>
</div>

</body>
</html>




<script>

$(document).ready(function(){
	$('#type').change(function(){
		var Id_Ads=$(this).val();
		$.ajax({
			url:"core/load_data.php",
			method:"POST",
			data:{Id_Ads:Id_Ads,Id_Categori:$('#categori').val(),date:$('#date').val()},
			success:function(data){
				$('#show_anunt').html(data);
			}
		});
	});
	$('#date').change(function(){
		var date=$(this).val();
		$.ajax({
			url:"core/load_data.php",
			method:"POST",
			data:{Id_Ads:$('#type').val(),Id_Categori:$('#categori').val(),date:date},
			success:function(data){
				$('#show_anunt').html(data);
			}
		});
	});
	$('#categori').change(function(){
		var Id_Categori=$(this).val();
		$.ajax({
		url:"core/load_data.php",
		method:"POST",
		data:{Id_Ads:$('#type').val(),Id_Categori:Id_Categori,date:$('#date').val()},
		success:function(data){
			$('#show_anunt').html(data);
			}
		});
	});
});
</script>