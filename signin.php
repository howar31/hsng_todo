<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="HSNG todo list">
<meta name="author" content="Howar31">

<title>HSNG Todo List 2013 - Sign In</title>

<!-- Bootstrap core CSS -->
<link href="./bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="signin.css" rel="stylesheet">

</head>

<body>

<div class="container">
	<h1><a href="./">HSNG ToDo 2013</a></h1>
	<? include('./msg.php'); ?>

	<form class="form-signin" action="dosignin.php" method="POST">
		<h2 class="form-signin-heading">Please sign in</h2>
		<input type="text" class="input-block-level" placeholder="Email address" name="email"  autofocus>
		<input type="password" class="input-block-level" placeholder="Password" name="password">
		<button class="btn btn-large btn-primary btn-block" type="submit">Sign in</button>
		<p><a href="./signup.php">No account? Sign up here.</a></p>
	</form>

</div> <!-- /container -->

</body>
</html>
