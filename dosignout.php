<?php
require('config.php');

setcookie("session_id", "", (time() - $cookieexpiry));

header('Location: signin.php?msg=signout');
?>
