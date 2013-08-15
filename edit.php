<?
require('./incsession.php');
$pid = $_POST['pid'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="HSNG todo list">
    <meta name="author" content="Howar31">

    <title>HSNG Todo List 2013 - Edit Todo</title>

    <!-- Bootstrap core CSS -->
    <link href="./bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="edit.css" rel="stylesheet">
    <script src="./jquery-2.0.3.min.js"></script>	
    <script src="./bootstrap/js/bootstrap.js"></script>
  </head>

  <body>

    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
      <div class="navbar navbar-fixed-top">
        <div class="container">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">HSNG Todo List 2013</a>
          <div class="nav-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="./">Home</a></li>
              <li><a href="./user.php"><?=$username;?></a></li>
              <li><a href="./dosignout.php">Sign out</a></li>
<? /*
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
*/ ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>

      <!-- Begin page content -->
      <div class="container">
        <div class="page-header">
          <h1><?=$username;?></h1>
        </div>
	<? include('./msg.php'); ?>

	<?
	$con = mysql_connect($db_host, $db_user, $db_pass) or die(mysql_error());
	mysql_select_db($db_name, $con);

	$query = "SELECT chk, due, todo FROM $table_todo WHERE id = $pid";
	$result = mysql_query($query, $con) or die(mysql_error());

	if (mysql_num_rows($result)) {
		$row = mysql_fetch_row($result);
		$chk = $row[0];
		$due = $row[1];
		$todo = $row[2];
	}
	?>

	<form class="form-signin" action="doedit.php" method="POST">
		<h2 class="form-signin-heading">Edit Todo</h2>
		<label for='chk'>Is this finished?</label><input type="checkbox" class="form-control" name="chk" <?echo ($chk)?'checked':'';?> />
		<input type="date" placeholder="Deadline" class="form-control" name="due" value="<?=$due;?>">
		<input type="text" placeholder="Todo..." class="form-control" name="todo" value="<?=$todo;?>">
		<input type="hidden" name="pid" value="<?=$pid;?>">
		<button class="btn btn-large btn-primary btn-block" type="submit">Update</button>
	</form>
      </div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted credit">Maintain by <a href="http://about.me/howar31">Howar31</a> @ 2013.08.15</p>
      </div>
    </div>

  </body>
</html>
