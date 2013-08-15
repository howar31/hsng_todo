<?php
require_once('config.php');

$chk = $_POST['chk'];
$due = $_POST['due'];
$todo = $_POST['todo'];
$pid = $_POST['pid'];

$con = mysql_connect($db_host, $db_user, $db_pass) or die(mysql_error());
mysql_select_db($db_name, $con);

if (!$todo) {
	$msg = 'noetodo';
} else {
	$chk = ($chk == 'on')?1:0;
	if ($due) {
		$query = "UPDATE $table_todo SET chk = '$chk', due = '$due', todo = '$todo', posttime = NOW() WHERE id = '$pid'";
	} else {
		$query = "UPDATE $table_todo SET chk = '$chk', due = NULL, todo = '$todo', posttime = NOW() WHERE id = '$pid'";
	}
	mysql_query($query, $con) or die ('[Error] doedit: '.mysql_error().'<br>'.$query);
}

if ($msg) {
	header('Location: ./?msg='.$msg);
} else {
	header('Location: ./');
}
?>
