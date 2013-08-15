<?php
require_once('config.php');

$msg = '';

$chk = $_POST['chk'];
$due = $_POST['due'];
$todo = $_POST['todo'];
$owner = $_POST['owner'];

$con = mysql_connect($db_host, $db_user, $db_pass) or die(mysql_error());
mysql_select_db($db_name, $con);

if (!$todo) {
	$msg = 'notodo';
} else {
	$chk = ($chk == 'on')?1:0;
	if ($due) {
		$query = "INSERT INTO $table_todo (chk, due, todo, posttime, owner) VALUES ($chk, '$due', '$todo', NOW(), '$owner')";
	} else {
		$query = "INSERT INTO $table_todo (chk, due, todo, posttime, owner) VALUES ($chk, NULL, '$todo', NOW(), '$owner')";
	}
	mysql_query($query, $con) or die ('[Error] dotodo: '.mysql_error().'<br>'.$query);
}

if ($msg) {
	header('Location: ./?msg='.$msg);
} else {
	header('Location: ./');
}
?>
