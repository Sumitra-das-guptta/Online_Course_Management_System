<?php
 include 'lib/user.php';
 include 'inc/head.php';

session::checksession();
?>

<?php
//id dhore profile shw korar jonno
if (isset($_GET['coursecode'])) { 
  $userid=$_GET['coursecode'];

 }
  $user=new user();
 if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])) {
  $updateuser = $user->updatecoursedata($userid,$_POST);
 }
 ?>


  <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1><i class="fa fa-pencil"></i> Course Details</h1>
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
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
              <h4>Course Details</h4>
            </div>
            <div class="card-block" style="padding-left: 15px;padding-right: 15px;padding-bottom: 15px;padding-top: 15px;">
              <?php 
  if(isset($updateuser)){
    echo $updateuser;
  }

  ?>
   
    <?php
     
    $userdata=$user->getcoursebycode($userid);
     if ($userdata){ ?>
     
              <form method="POST">
                <div class="form-group">
                  <label for="coursecode" class="form-control-label"><b>Course Code</b></label>
                <input type="text" id="coursecode" class="form-control" name="coursecode" value="<?php echo $userdata->coursecode;?>"/>
                </div>
                <div class="form-group">
                  <label for="coursetitle" class="form-control-label"><b>Course Title/Name</b></label>
                  <input type="text" id="coursetitle" class="form-control" name="coursetitle" value="<?php echo $userdata->coursetitle; ?>"/>
                </div>
                 <div class="form-group">
                  <label for="assignto" class="form-control-label"><b>Assign To </b></label>
                  <input type="text" id="assignto" class="form-control" name="assignto" value="<?php echo $userdata->assignto; ?>" />
                </div>
                 <div class="form-group">
                  <label for="credit" class="form-control-label"><b>Credit</b></label>
                  <input type="text" id="credit" class="form-control" name="credit" value="<?php echo $userdata->credit; ?>" /> 
                </div> 
                 <div class="form-group">
                  <label for="credit" class="form-control-label"><b>Reference Book</b></label>
                  <input type="text" id="reference_book" class="form-control" name="reference_book" value="<?php echo $userdata->reference_book; ?>" /> 
                </div> 
                 
      <div class="form-group">
      <label for="batch" class="form-control-label"><b>Semester</b></label>
      <input type="text" id="semester" class="form-control" name="semester" value="<?php echo $userdata->semester; ?>" />
    </div>
                
                </div>
               
               <?php
   
   // $sesid=session::get("id");
    $sesty=session::get("usertype");
  
  ?><?php if($sesty=="admin"){?>
           <div class="col-md-3">
          <button type="submit" name="update" class="btn btn-info" style="padding:7px 40px;"><i class="fa fa-remove"></i> Update</button></div>
      
<?php } ?>  </div>
              </form>
                <?php } ?>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </section>
<br><br><br><br>
 
  
  <?php
  include 'inc/foot.php';
  ?>