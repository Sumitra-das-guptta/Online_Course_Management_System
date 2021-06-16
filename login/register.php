<?php
  include 'inc/headernew.php';

   include 'lib/user.php';
?>
<?php
$user=new user();
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])) {
	$usrregi = $user->userregistration($_POST);
}

?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h2>Add Student</h2>
		</div>
		<div class="panel-body" style="min-height: 390;">
			<div style="max-width: 600px;margin:0 auto">
				<?php
				if (isset($usrregi)) {
					echo $usrregi;
				}

				?>
		<form action="" method="POST">
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" id="name" class="form-control" name="name" placeholder="name" />
		</div>	
		<div class="form-group">
			<label for="username">User Name</label>
			<input type="text" id="username" class="form-control" name="username" placeholder="username" />
		</div>	
		<div class="form-group">
			<label for="email">Email Adress</label>
			<input type="text" id="email" class="form-control" name="email" placeholder="email" />
		</div>	
		<div class="form-group">
			<label for="registration_no">Regi</label>
			<input type="text" id="registration_no" class="form-control" name="registration_no" placeholder="roll" />	
		<div class="form-group">
			<label for="department">Department</label>
			<input type="text" id="department" class="form-control" name="department" placeholder="department" />
		</div>	
		
		<div class="form-group">
      <label for="semester">Semester</label>
      <select type="text" id="semester" class="form-control" name="semester" placeholder="semester">
          <option value="L1-T1">L1-T1</option>
          <option value="L1-T2">L1-T2</option>
          <option value="L2-T1">L2-T1</option>
          <option value="L2-T2">L2-T2</option>
          <option value="L3-T1">L3-T1</option>
          <option value="L3-T2">L3-T2</option>
          <option value="L4-T1">L4-T1</option>
          <option value="L4-T2">L4-T2</option>
        </select>
    </div> 	
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" id="password" class="form-control" name="password" placeholder="***" />
		</div>	
		<button type="submit" name="register" class="btn btn-success">Register</button>
			
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