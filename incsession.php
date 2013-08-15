<?php
require_once('config.php');

// 檢查Cookie，沒餅乾就去登入
if (!isset($_COOKIE['session_id'])) {
	header('Location: signin.php?msg=no');
} else {
// 有餅乾？檢查session
	$session = $_COOKIE['session_id'];
	$con = mysql_connect($db_host, $db_user, $db_pass) or die(mysql_error());
	mysql_select_db($db_name, $con) or die(mysql_error());

	$query = "SELECT id FROM $table_user WHERE session = '$session'";
	$result = mysql_query($query, $con) or die(mysql_error());

	if (!mysql_num_rows($result)) {
// session有問題，重新登入
		header('Location: signin.php?msg=cookie');
	}

// 都沒問題！取user資料
	$query = "SELECT id, email, username FROM $table_user WHERE session = '$session'";
	$result = mysql_query($query, $con) or die(mysql_error());

	if (mysql_num_rows($result)) {
		$row = mysql_fetch_row($result);

		$id = $row[0];
		$email = $row[1];
		$username = $row[2];
	}
}
?>
