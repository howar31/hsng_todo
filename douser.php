<?php
require('config.php');

$msg = 'update';
$session = $_COOKIE['session_id'];

$email = $_POST['email'];
$username = $_POST['username'];
$oldpassword = $_POST['oldpassword'];
$newpassword = $_POST['newpassword'];
$newpasswordagain = $_POST['newpasswordagain'];

$con = mysql_connect($db_host, $db_user, $db_pass) or die(mysql_error());
mysql_select_db($db_name, $con);

if ($username) {
	$query = "UPDATE $table_user SET username = '$username' WHERE session = '$session'";
	mysql_query($query, $con) or die ('[Error] douser: '.mysql_error().'<br>'.$query);
}

if ($newpassword) {
	$query = "SELECT password FROM $table_user WHERE session = '$session'";
	$result = mysql_query($query, $con) or die ('[Error] signin: '.mysql_error().'<br>'.$query);
	$row = mysql_fetch_row($result);
	$password = $row[0];

	if (!$oldpassword) {
		$msg = 'opw';
	} else if ($oldpassword != $password) {
		$msg = 'pww';
	} else if ($newpassword != $newpasswordagain) {
		$msg = 'npw';
	} else {
		$query = "UPDATE $table_user SET password = '$newpassword' WHERE session = '$session'";
		mysql_query($query, $con) or die ('[Error] douser: '.$query);
	}
}

header('Location: user.php?msg='.$msg);
?>
