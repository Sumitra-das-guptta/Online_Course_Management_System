<?php
 include 'inc/headernew.php';
include 'lib/user.php';
session::checklogin();
?>
<?php
$user=new user();
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])) {
	$usrlogin = $user->userlogin($_POST);
}

?>
	
	<?php
if (isset($usrlogin)) {
	echo $usrlogin;
}
	?>

<div class="panel panel-default">
    <div class="panel-heading">
      <h2>User Login</h2>
    </div>
    <div class="panel-body" style="min-height: 390;">
      <div style="max-width: 600px;margin:0 auto">

<form action="" method="POST">
    <div class="form-group">
      <label for="email">Email Adress</label>
      <input type="text" id="email" class="form-control" name="email" placeholder="email" />
    </div>  
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" class="form-control" name="password" placeholder="***" />
    </div>  
    <button type="submit" name="login" class="btn btn-success">login</button>
      
    </form>
    </div>
    </div>
  <?php
     include 'inc/footer.php';

  ?>
</div>
 

		

	
<?php
include 'inc/footer1.php';
?>