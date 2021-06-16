<?php
 include 'lib/user.php';
 include 'inc/headernew.php';

session::checksession();
?>
<?php 

    $user=new user();
 	$crs = $_GET['crs'];
 	$crs = 'CSE-'.$crs;
 	$usr = $user->unassigncourse($crs);
 			header("Location:unassign_course.php");

	
?>
	<?php 
	
if(isset($usr)){
	
		echo $usr;

	}
	?>	