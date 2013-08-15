<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="HSNG todo list">
<meta name="author" content="Howar31">

<title>HSNG Todo List 2013 - Sign Up</title>

<!-- Bootstrap core CSS -->
<link href="./bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="signup.css" rel="stylesheet">

</head>

<body>

<div class="container">
	<h1><a href="./">HSNG ToDo 2013</a></h1>
	<? include('./msg.php'); ?>

	<form class="form-signin" action="dosignup.php" method="POST">
		<h2 class="form-signin-heading">Sign Up New User</h2>
		<input type="text" class="input-block-level" placeholder="Email" title="Email cannot be changed." name="email">
		<input type="text" class="input-block-level" placeholder="Username" name="username">
		<input type="password" class="input-block-level" placeholder="New Password" name="password">
		<input type="password" class="input-block-level" placeholder="New Password Again" name="passwordagain">
		<button class="btn btn-large btn-primary btn-block" type="submit">Sign up</button>
		<p><a href="./signin.php">Already have an account?  Sign in now.</a></p>
	</form>

</div> <!-- /container -->

</body>
</html>
