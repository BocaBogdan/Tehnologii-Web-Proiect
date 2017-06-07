<?php 
include 'core/init.php';
protect_page();
admin_protect();
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
	<div>
		<a href = "logout.php" class="button" >Log Out</a>
		<a href = "changepassword.php" class="button" >Change password</a>
		<a href="lost.php" class="button">Home</a>
	</div>
</nav>
	<a href="generare.php" class="button">Generare</a>
	<?php echo fill_user_list()?>
</body>
</html>
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