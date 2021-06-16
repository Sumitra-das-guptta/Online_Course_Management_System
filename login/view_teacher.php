<?php
 include 'lib/user.php';
 include 'inc/headernew.php';
    session::checksession();

?>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Teacher List
			</h3>
		</div>
		<div class="panel-body style="min-height: 390;"">
			<div style="max-width: 600px;margin:0 auto">
		<table class="table table-striped">
			<tr>
			<th width="20%">Serial</th>
			<th width="20%">Name</th>
			<th width="20%">Username</th>
			<th width="20%">Email Address</th>
			<th width="20%">Action</th>
		</tr>
		<?php
		$user=new user();
		$userdata=$user->getteacherdata();
		if ($userdata) {
			$i=0;
		foreach ($userdata as $sdata) {
			$i++;
				?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $sdata['name'];?></td>
			<td><?php echo $sdata['username'];?></td>
			<td><?php echo $sdata['email'];?></td>
			<td><a class="btn btn-primary" href="profile.php?id=<?php
			 echo $sdata['id'];   ?>">view</a></td>
		</tr>	
		<?php 		
	      }
		}else{
		?>
		<tr><td colspan="5"><h2>No User Data Found</h2></td></tr>
	<?php } ?>
		
		</table>
		</div>	
		</div>
	<?php
     include 'inc/footer.php';

	?>
</div>
<?php
include 'inc/footer1.php';
?>