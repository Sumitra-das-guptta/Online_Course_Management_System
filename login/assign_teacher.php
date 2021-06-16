<?php
  include 'inc/headernew.php';

   include 'lib/user.php';
   session::checksession();
?>

<?php
if (isset($_GET['coursecode'])) { 
  $code=(int)$_GET['coursecode'];

 }
$user=new user();
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])) {
  $usrregi = $user->assignteacher($_POST);
}

?>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h2>Assign Teacher</h2>
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
      <label for="coursecode">Course Code</label>
      <select type="text" id="coursecode" class="form-control" name="coursecode" placeholder="course code">
        <?php
    $user=new user();
    $userdata=$user->getcoursedata();
    if ($userdata) {
      $i=0;
     foreach ($userdata as $sdata) { 
      $i++;
      ?>
       <option><?php echo $sdata['coursecode'];?></option> 
      <?php } ?>
     <?php }   
    else{ ?>
    <h2>No Course Data Found</h2>
   <?php } ?>

        </select>
    </div>  
    
    <div class="form-group">
      <label for="assignto">Teacher</label>
       <select type="text" id="assignto" class="form-control" name="assignto" placeholder="teacher name">
        <?php
    $user=new user();
    $userdata=$user->getteacherdata();
    if ($userdata) {
      $i=0;
    foreach ($userdata as $sdata) {
      $i++;
        ?>
       <option><?php echo $sdata['name'];?></option> 
         
    <?php     
        }
    }else{
    ?>
    <h2>No User Data Found</h2>
  <?php } ?>
        </select>
    </div>   
    <button type="submit" name="register" class="btn btn-success">Save</button>
      
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