<?php
  include 'inc/headernew.php';

   include 'lib/user.php';
?>
<?php
$user=new user();
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])) {
  $usrregi = $user->adminregistration($_POST);
}

?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2>Add Admin</h2>
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
      <input type="text" id="name" class="form-control" name="name" placeholder="teacher name" />
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
      <label for="tid">TID</label>
      <input type="text" id="tid" class="form-control" name="tid" placeholder="roll" />
    </div>  
    <div class="form-group">
      <label for="contactno">ContactNo</label>
      <input type="text" id="contactno" class="form-control" name="contactno" placeholder="contact number..." />
    </div> 
    <div class="form-group">
      <label for="credittake">Credit To Be Taken</label>
      <input type="text" id="credittake" class="form-control" name="credittake" placeholder="credit to be taken..." />
    </div>
    <div class="form-group">
      <label for="designation">Designation</label>
      
      <select id="designation" class="form-control" name="designation">
          <option value="professor">Professor</option>
          <option value="associate_professor">Associate Professor</option>
          <option value="assistant_professor">Assistant Professor</option>
          <option value="lecturer">Lecturer</option>
          <option value="assistant_lecturer">Assistant Lecturer</option>
        </select>
    </div>  
    <div class="form-group">
      <label for="department">Department</label>
   
       <select id="department" class="form-control" name="department">
          <option value="CSE">CSE</option>
          <option value="EEE">EEE</option>
          <option value="MATH">MATH</option>
          <option value="ECONOMICS">ECONOMICS</option>
          <option value="BUSINESS STUDIES">BUSINESS STUDIES</option>
        </select>
    </div>  
     
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" id="password" class="form-control" name="password" placeholder="******" />
    </div>  
    <button type="submit" name="register" class="btn btn-success">save</button>
      
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