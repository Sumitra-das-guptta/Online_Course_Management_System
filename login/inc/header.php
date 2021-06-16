<?php
$filepath= realpath(dirname(__FILE__));
include_once $filepath.'/../lib/session.php';
session::init();

?>


<!DOCTYPE html>
<html>
<head>
	<title>login register      </title>
	<link rel="stylesheet" type="text/css" href="inc/bootstrap.min.css"/>
	<script src="inc/jquery.min.js"></script>
	<script src="inc/bootstrap.min.js"></script>
</head>
<?php
if (isset($_GET['action'])&& $_GET['action']=="logout") {
session::destroy();
}


?>
<body>
<div class="container">
	<nav class="navbar navbar-default ">
		<div class="container-fluid">
			<div class="navber-header">
				<a class="navbar-brand" href="index.php">login register system php </a>
			</div>
			<ul class="nav navbar-nav pull right">
				<?php
				$id=session::get("id");
				$userlogin=session::get("login");
				if ($userlogin==true) {
				?>
				<li><a href="index.php">Home</a></li>
				<li><a href="profile.php?id=<?php echo $id;?>">Profile</a></li>
				<li><a href="?action=logout">Logout</a></li>
				<?php }else{
				?>
				<li><a href="login1.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
			<?php }  ?>
			</ul>
		</div>
	</nav>
