<?php
 include 'lib/user.php';
 include 'inc/head.php';

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
  if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['updatepass'])) {
  $updatepass = $user->updateuserpassword($userid,$_POST);
} 
 ?>


  <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1><i class="fa fa-pencil"></i> Profile</h1>
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
              <h4>Profile</h4>
            </div>
            <div class="card-block" style="padding-left: 15px;padding-right: 15px;padding-bottom: 15px;padding-top: 15px;">
              <?php 
  if(isset($updateuser)){
    echo $updateuser;
  }

  ?>
    <?php 
  if(isset($updatepass)){
    echo $updatepass;
  }

  ?>
    <?php
     
    $userdata=$user->getUserById($userid);
     if ($userdata){ ?>
     
              <form method="POST">
                <div class="form-group">
                  <label for="name" class="form-control-label"><b>Name</b></label>
                <input type="text" id="name" class="form-control" name="name" value="<?php echo $userdata->name; ?>"/>
                </div>
                <div class="form-group">
                  <label for="emaik" class="form-control-label"><b>Username</b></label>
                  <input type="text" id="username" class="form-control" name="username" value="<?php echo $userdata->username; ?>"/>
                </div>
                 <div class="form-group">
                  <label for="emaik" class="form-control-label"><b>Email Address</b></label>
                  <input type="text" id="email" class="form-control" name="email" value="<?php echo $userdata->email; ?>" />
                </div>
                 <div class="form-group">
                  <label for="emaik" class="form-control-label"><b>Department</b></label>
                  <input type="text" id="department" class="form-control" name="department" value="<?php echo $userdata->department; ?>" placeholder="department" />
                </div> 
                  <?php 
    $type= $userdata->usertype;
    if($type=='student'){
    ?>
      <div class="form-group">
      <label for="batch" class="form-control-label"><b>Semester</b></label>
      <input type="text" id="semester" class="form-control" name="semester" value="<?php echo $userdata->semester; ?>" placeholder="semester" />
    </div>  
       <?php }
       else { ?>
                <div class="form-group">
                  <label for="emaik" class="form-control-label"><b>TID</b></label>
                  <input type="text" id="tid" class="form-control" name="tid" value="<?php echo $userdata->tid; ?>" placeholder="tid" />
                </div> 
                <div class="form-group">
                  <label for="emaik" class="form-control-label"><b>Contact No</b></label>
                  <input type="text" id="contactno" class="form-control" name="contactno" value="<?php echo $userdata->contactno; ?>" placeholder="contactno..." />
                </div>
                 <div class="form-group">
                  <label for="emaik" class="form-control-label"><b>Credit To Be Taken</b></label>
                  <input type="text" id="credittake" class="form-control" name="credittake" value="<?php echo $userdata->credittake; ?>" placeholder="credit take" /> 
                </div>
                 <div class="form-group">
                  <label for="emaik" class="form-control-label"><b>Designation</b></label>
                  <input type="text" id="designation" class="form-control" name="designation" value="<?php echo $userdata->designation; ?>" placeholder="designation" />
    
                </div>
               <?php } ?>
               <?php
    $type= $userdata->usertype;
    $sesid=session::get("id");
    $sesty=session::get("usertype");
    if ($userid==$sesid  || $sesty=="admin"){ 
      ?>
              <div class="row">
                <div class="col-md-3">   
          <a class="btn btn-success" data-toggle="modal" data-target="#passwordModal" style="padding:7px 40px;"><i class="fa fa-lock"></i> Change Password</a></div>
        &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp
        <?php 
         } 
  ?><?php if($sesty=="admin"){?>
           <div class="col-md-3">
          <button type="submit" name="update" class="btn btn-info" style="padding:7px 40px;"><i class="fa fa-remove"></i> Update</button></div>
      
<?php } ?>  </div>
 &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp   &nbsp&nbsp&nbsp&nbsp&nbsp
  

              </form>
                <?php } ?>
            </div>
          </div>
        </div>
        <?php
        if($userid==$sesid){  ?>
        <div class="col-md-3">
          <h3>Your Avatar</h3>
          <img src="img/avatar.png" alt="" class="d-block img-fluid mb-3">
          <a href="#" class="btn btn-primary btn-block">Edit Image</a>
          <a href="#" class="btn btn-danger btn-block">Delete Image</a>
        </div>
       <?php } ?>
      </div>
    </div>
  </section>
<br><br><br><br>
 

 <!-- Password MODAL -->
  <div class="modal fade" id="passwordModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title" id="passwordModalLabel">Edit Password</h5>
          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
        
    <form action="" method="POST">
            <div class="form-group">
              <label for="old_pass" class="form-control-label">Old Password</label>
      <input type="password" id="old_pass" class="form-control" name="old_pass"/>
            </div>
            <div class="form-group">
              <label for="password" class="form-control-label">New Password</label>
            <input type="password" id="password" class="form-control" name="password" />
            </div>
             <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="updatepass" class="btn btn-warning">Edit Password</button>
        </div>
          </form>
        </div>
       
      </div>
    </div>
  </div>
  
  <?php
  include 'inc/foot.php';
  ?>