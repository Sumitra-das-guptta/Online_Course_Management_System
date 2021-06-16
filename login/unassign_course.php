<?php
 include 'lib/user.php';
 include 'inc/headernew.php';

session::checksession();
?>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>unassign course<span class="pull-right"><a href="homepage.php" class="btn btn-primary">back</a></span></h2>
		</div>
		<div class="panel-body" style="min-height: 390;">
		<div style="max-width: 600px;margin:0 auto">
		<?php 
	if(isset($usr)){
		echo $usr;
	}

	?>	
	<?php 
	if(isset($updateuser)){
		echo $updateuser;
	}

	?>
		<?php
    $user=new user();
    $userdata=$user->getcoursedata();
    if ($userdata) {
      $i=0;

    foreach ($userdata as $sdata) {
      $i++;

      $str1 = $sdata['coursecode'];
      $str = (explode("-",$str1)); 
        ?>
		<form action="" method="POST">
		<div class="form-group">

			
			<input type="text" id="coursecode" class="form-control" name="coursecode" value="<?php echo $sdata['coursecode']; ?>"/>
			
			
		</div>	
		<?php

			$assign= $sdata['assignto'];
			if($assign==""){ ?>
			<a class = "btn btn-success" style="float: right;" href="assign_teacher.php?coursecode=<?php echo $sdata['coursecode']; ?>">assign</a><br><br><br>
		<?php }
		else{ ?>
		<a href="unassign.php?crs=<?php echo $str[1]; ?>" name="unassign" class="btn btn-warning" style="float: right;">unassign</a><br><br><br>
	    <?php } ?>
		

		<?php     
        }
    }else{
    ?>
    <h2>No User Data Found</h2>
  <?php } ?>
		
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