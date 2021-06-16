<?php
  include 'inc/head.php';

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
    <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>Assign Course</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="actions" class="py-4 mb-4 bg-faded">
    <div class="container">
      <div class="row">
        <div class="col-md-3 mr-auto">
          <a href="index.php" class="btn btn-secondary btn-block"><i class="fa fa-arrow-left"></i> Back to Home</a>
        </div>
      
      </div>
    </div>
  </section>
  <!-- Edit POST -->
  <section id="edit-post">
    <div class="container">
      <div class="row">
        <div class="col">
          
            
            <div class="card-block" style="padding-left: 130px;padding-right: 130px;padding-bottom: 30px;padding-top: 30px;">
               <?php
        if (isset($usrregi)) {
          echo $usrregi;
        }

        ?>
              <form method="POST">
              
                  <div class="form-group">
                  <label for="coursecode" class="form-control-label" ><b>Course Code</b></label>
                  <select class="form-control" id="coursecode" name="coursecode" placeholder="course code">
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
                  <label for="assiginto" class="form-control-label"><b>Teacher</b></label>
                  <select class="form-control" id="assignto" class="form-control" name="assignto" placeholder="teacher name">
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
               
            <button type="submit" name="register" class="btn btn-success" >&nbsp&nbspSave&nbsp&nbsp</button> 
               
              </form>
              <div>
        
        </div>
            </div>
          
        </div>
       
      </div>
    </div>

        
  </section><br>
  
<br><br><br><br>
 


 

  <?php
  include 'inc/foot.php';
  ?>