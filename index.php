<?
require_once('./config.php');
require_once('./incsession.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="HSNG todo list">
    <meta name="author" content="Howar31">

    <title>HSNG Todo List 2013</title>

    <!-- Bootstrap core CSS -->
    <link href="./bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="index.css" rel="stylesheet">
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
              <li class="active"><a href="./">Home</a></li>
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
          <h1><?=$username;?>'s Todo List</h1>
        </div>
        <p class="lead">Here are your tasks...</p>
	<? include('./msg.php'); ?>

	<div class="row">
		<div class="col-lg-1">Check</div>
		<div class="col-lg-2">Deadline</div>
		<div class="col-lg-5">Todo</div>
		<div class="col-lg-2">PostTime</div>
		<div class="col-lg-1">Edit</div>
		<div class="col-lg-1">Delete</div>
	</div>
	<form action="dotodo.php" method="POST">
		<div class="row">
			<div class="col-lg-1"><input type="checkbox" class="form-control" name="chk" /></div>
			<div class="col-lg-2"><input type="date" placeholder="Deadline" class="form-control" name="due"></div>
			<div class="col-lg-5"><input type="text" placeholder="Todo..." class="form-control" name="todo"></div>
			<div class="col-lg-2">Now...</div>
			<div class="col-lg-2"><button class="btn btn-xs btn-primary btn-block" type="submit">Add</button></div>
			<input type="hidden" name="owner" value="<?=$email;?>">
		</div>
	</form>
<?
	$con = mysql_connect($db_host, $db_user, $db_pass) or die(mysql_error());
	mysql_select_db($db_name, $con);

	$query = "SELECT id, chk, due, todo, posttime FROM $table_todo WHERE owner = '$email'";
	$result = mysql_query($query, $con) or die(mysql_error());

	while($row = mysql_fetch_array($result)) {
		$str_chk = ($row['chk'])?'<span class="text-success">Done</span>':'<span class="text-danger">Not yet</span>';
?>
		<div class="row"><form action="ed.php" method="POST">
<?
		echo '<div class="col-lg-1">'.$str_chk.'</div>';
		echo '<div class="col-lg-2">'.$row['due'].'</div>';
		echo '<div class="col-lg-5">'.$row['todo'].'</div>';
		echo '<div class="col-lg-2">'.$row['posttime'].'</div>';
		echo '<div class="col-lg-1"><button class="btn btn-xs btn-warning btn-block" name="edel" value="edit" type="submit">Edit</button></div>';
		echo '<div class="col-lg-1"><button class="btn btn-xs btn-danger btn-block" name="edel" value="del" type="submit">Delete</button></div>';
?>
		<input type="hidden" name="pid" value="<?=$row['id'];?>">
		</form></div>
<?
	}
?>
      </div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted credit">Maintain by <a href="http://about.me/howar31">Howar31</a> @ 2013.08.15</p>
      </div>
    </div>

  </body>
</html>
