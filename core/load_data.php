<?php
$connect=mysql_connect("localhost","root","","");
mysql_select_db('lofo') or die($connect_error);
$output=' ';
	if(($_POST["Id_Ads"]!="")&&($_POST["Id_Categori"]!=""))
	{
		$sql="SELECT * FROM lpost where type='".$_POST["Id_Ads"]."'";
		$sql.="and  Id_Categori='".$_POST["Id_Categori"]."'";
	}
	else if($_POST["Id_Ads"]!=""){
		$sql="SELECT * FROM lpost where type='".$_POST["Id_Ads"]."'";
	}
	else if($_POST["Id_Categori"]!=""){
		$sql="SELECT * FROM lpost where Id_Categori='".$_POST["Id_Categori"]."'";
	}
	else{
		$sql="SELECT * FROM lpost";
	}
	
	if(strcmp($_POST["date"],"ASC")==0){
		$sql.=" ORDER BY DATE ASC";
		echo"sunt pe asc";
			
	}
	else{
		$sql.=" ORDER BY DATE DESC";
			echo"sunt pe desc";
	}
	
	
		

	echo $sql;
	$result=mysql_query($sql);
	if($result === FALSE) { 
		echo "Ceva nu este ok";
		echo mysql_error();
		 die(mysql_error()); 
	
	}
	while($row=mysql_fetch_array($result)){
		$output.="<div>";
		$output.="<p>" . $row['description'] . "</p>";
		$output.="<p><img src='image/".$row['image'] ."'".'height='.'"42"'. 'width="42"'.">"."</p>";
		$output.="<p>" . $row['lpost_id'] . "</p>";
		$output.="</div>";
	}
	echo $output;

?>