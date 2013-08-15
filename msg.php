<?
switch ($_GET['msg']) {
// index
// signin
	case 'no':
		echo '<p class="text-danger">Please sign in first!</p>';
		break;
	case 'empty':
		echo '<p class="text-warning">All fields are required.</p>';
		break;
	case 'cookie':
		echo '<p class="text-info">Sign-in expired, please sign in again.</p>';
		break;
	case 'signout':
		echo '<p class="text-success">Sign out successfully.</p>';
		break;
	case 'signup':
		echo '<p class="text-success">Sign up successfully.  Now please sign in.</p>';
		break;
	case 'error':
		echo '<p class="text-danger">Email or password incorrect.  Sign in failed.</p>';
		break;
// signup
	case 'pwagain':
		echo '<p class="text-warning">Passwords are not matched.  Please try again.</p>';
		break;
// user
	case 'update':
		echo '<p class="text-success">Info updated successfully!</p>';
		break;
	case 'opw':
		echo '<p class="text-warning">Please input the old password to change the password.</p>';
		break;
	case 'npw':
		echo '<p class="text-warning">New passwords are not matched.  Please try again.</p>';
		break;
	case 'pww':
		echo '<p class="text-danger">Old password is incorrect!</p>';
		break;
// edit
// general
	case 'empty':
		echo '<p class="text-warning">All fields are required.</p>';
		break;
	case 'notodo':
		echo '<p class="text-warning">What do you want to do?</p>';
		break;
	default:
}
?>
