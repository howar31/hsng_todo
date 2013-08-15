<? require('./incsession.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="HSNG todo list">
    <meta name="author" content="Howar31">

    <title>HSNG Todo List 2013 - User [<?=$username;?>]</title>

    <!-- Bootstrap core CSS -->
    <link href="./bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="user.css" rel="stylesheet">
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
              <li class="active"><a href="./user.php"><?=$username;?></a></li>
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

	<form class="form-signin" action="douser.php" method="POST">
		<h2 class="form-signin-heading">Edit Info</h2>
		<input type="text" class="input-block-level" placeholder="Email" title="Email cannot be changed." value="<?=$email;?>" name="email" disabled>
		<input type="text" class="input-block-level" placeholder="Username" value="<?=$username;?>" name="username">
		<input type="password" class="input-block-level" placeholder="Old Password" title="Required if change passworld." name="oldpassword">
		<input type="password" class="input-block-level" placeholder="New Password" name="newpassword">
		<input type="password" class="input-block-level" placeholder="New Password Again" name="newpasswordagain">
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
