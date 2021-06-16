<?php
 include 'lib/user.php';
 include 'inc/headernew.php';

session::checksession();
?>

<?php
//id dhore profile shw korar jonno
if (isset($_GET['id'])) {
	$userid=(int)$_GET['id'];
	$sesid=session::get("id");
	$sestype=session::get("usertype");
		if ($userid!=$sesid){
			if($sestype!="admin")
			header("Location: homepage.php");

		}
}
$user=new user();
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['updatepass'])) {
	$updatepass = $user->updateuserpassword($userid,$_POST);
}

?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>Change Password<span class="pull-right"><a href="profile.php?id=<?php echo $userid?>" class="btn btn-primary">back</a></span></h2>
		</div>
		<div class="panel-body" style="min-height: 390;">
			<div style="max-width: 600px;margin:0 auto">
	<?php 
	if(isset($updatepass)){
		echo $updatepass;
	}

	?>
		<form action="" method="POST">
		<div class="form-group">
			<label for="old_pass">old password </label>
			<input type="password" id="old_pass" class="form-control" name="old_pass"/>
		</div>	
		<div class="form-group">
			<label for="password">New Password</label>
			<input type="password" id="password" class="form-control" name="password" />
		</div>	
	
		<button type="submit" name="updatepass" class="btn btn-success">Update</button>
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