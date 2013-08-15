<?php
require('config.php');

$msg = '';

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$passwordagain = $_POST['passwordagain'];

$con = mysql_connect($db_host, $db_user, $db_pass) or die(mysql_error());
mysql_select_db($db_name, $con);

if (!$email || !$username || !$password) {
	$msg = 'empty';
} else if ($password != $passwordagain) {
	$msg = 'pwagain';
} else {
	$query = "INSERT INTO $table_user (email, username, password) VALUES ('$email', '$username', '$password')";
	mysql_query($query, $con) or die ('[Error] dosignup: '.mysql_error().'<br>'.$query);
}

if ($msg) {
	header('Location: signup.php?msg='.$msg);
} else {
	header('Location: signin.php?msg=signup');
}
?>
