<?php
 include 'lib/user.php';
 include 'inc/headernew.php';

session::checksession();
?>

<?php
//id dhore profile shw korar jonno
if (isset($_GET['id'])) { 
	$userid=(int)$_GET['id'];

 }
  $user=new user();
 if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])) {
	
	$userinfo=$user->getUserById($userid);
	$ty=$userinfo->usertype;
	  if($ty=='student'){
	$updateuser = $user->updateuserdata($userid,$_POST);
 } 
else{ 
	$updateuser = $user->updateteacherdata($userid,$_POST);
 } 
  } 
 ?>


	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>Profile<span class="pull-right"><a href="homepage.php" class="btn btn-primary">back</a></span></h2>
		</div>
		<div class="panel-body" style="min-height: 390;">
			<div style="max-width: 600px;margin:0 auto">
	<?php 
	if(isset($updateuser)){
		echo $updateuser;
	}

	?>
		<?php
		 
		$userdata=$user->getUserById($userid);
		 if ($userdata){ ?>
	   
		<form action="" method="POST">
		<div class="form-group">

			<label for="name">Name</label>
			<input type="text" id="name" class="form-control" name="name" value="<?php echo $userdata->name; ?>"/>
		</div>	
		<div class="form-group">
			<label for="username">User Name</label>
			<input type="text" id="username" class="form-control" name="username" value="<?php echo $userdata->username; ?>"/>
		</div>	
		<div class="form-group">
			<label for="email">Email Adress</label>
			<input type="text" id="email" class="form-control" name="email" value="<?php echo $userdata->email; ?>" />
		</div>	
		
		<div class="form-group">
			<label for="department">Department</label>
			<input type="text" id="department" class="form-control" name="department" value="<?php echo $userdata->department; ?>" placeholder="department" />
		</div>	
		<?php 
		$type= $userdata->usertype;
		if($type=='student'){
		?>
		<div class="form-group">
			<label for="batch">semester</label>
			<input type="text" id="semester" class="form-control" name="semester" value="<?php echo $userdata->semester; ?>" placeholder="semester" />
		</div>	
	     <?php }
	     else { ?>
	     <div class="form-group">
			<label for="tid">TID</label>
			<input type="text" id="tid" class="form-control" name="tid" value="<?php echo $userdata->tid; ?>" placeholder="tid" />
			<div class="form-group">
			<label for="contactno">Contact No</label>
			<input type="text" id="contactno" class="form-control" name="contactno" value="<?php echo $userdata->contactno; ?>" placeholder="contactno..." />
		<div class="form-group">
			<label for="credittake">Credit To Be Taken</label>
			<input type="text" id="credittake" class="form-control" name="credittake" value="<?php echo $userdata->credittake; ?>" placeholder="credit take" />	
		<div class="form-group">
			<label for="designation">Designation</label>
			<input type="text" id="designation" class="form-control" name="designation" value="<?php echo $userdata->designation; ?>" placeholder="designation" />
		<?php } ?>
		<?php
		$type= $userdata->usertype;
		$sesid=session::get("id");
		$sesty=session::get("usertype");
		if ($userid==$sesid  || $sesty=="admin"){ 
			?>
		
		<a class = "btn btn-info" href="changepass.php?id=<?php echo $userid; ?>">Change Password</a>
	<?php 
         } 
	?><?php if($sesty=="admin"){?>
	<button type="submit" name="update" class="btn btn-success">Update</button>
<?php } ?>
		</form>
	<?php } ?>
	</div>
		</div>
   


	<?php
     include 'inc/footer.php';

	?>
</div>
<?php
include 'inc/footer1.php';
?>