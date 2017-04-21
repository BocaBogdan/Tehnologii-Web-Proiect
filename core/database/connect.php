<?php
$connect_error = "Sorry we have connections problems";
mysql_connect('localhost', 'root', '') or die($connect_error);
mysql_select_db('lofo') or die($connect_error);
?>