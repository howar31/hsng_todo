<?php
require('config.php');

$email = $_POST['email'];
$password = $_POST['password'];

if ($email == '' || $password == '') {
// 登入欄位為空
	header('Location: signin.php?msg=empty');
} else {
// 登入認證
	$con = mysql_connect($db_host, $db_user, $db_pass) or die(mysql_error());
	mysql_select_db($db_name, $con);

	$query = "SELECT id, MD5(UNIX_TIMESTAMP() + id + RAND(UNIX_TIMESTAMP())) session FROM $table_user WHERE email = '$email' AND password = '$password'";
	$result = mysql_query($query, $con) or die ('[Error] signin: '.mysql_error().'<br>'.$query);

// 登入資料符合
	if (mysql_num_rows($result)) {
		$row = mysql_fetch_row($result);

// 更新session
		$query = "UPDATE $table_user SET session = '$row[1]' WHERE id = $row[0]";
		mysql_query($query, $con) or die ('[Error] signin: '.mysql_error().'<br>'.$query);
        
// 更新cookie，六小時
		setcookie("session_id", $row[1], (time() + $cookieexpiry));

// 認證完畢，轉址
		header('Location: index.php');
	} else {
// 登入資料錯誤
		header('Location: signin.php?msg=error');
	}
}
?>
