<?php
require_once('config.php');

$edtype = $_POST['edel'];
$pid = $_POST['pid'];

$con = mysql_connect($db_host, $db_user, $db_pass) or die(mysql_error());
mysql_select_db($db_name, $con);

if ($edtype == 'del') {
	$query = "DELETE FROM $table_todo WHERE id = '$pid'";
	mysql_query($query, $con) or die ('[Error] ed: '.mysql_error().'<br>'.$query);

	header('Location: ./');
} else if ($edtype == 'edit') {
	require('edit.php');
}
?>
