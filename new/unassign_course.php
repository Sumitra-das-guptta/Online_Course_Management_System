<?php
 include 'lib/user.php';
 include 'inc/head.php';

session::checksession();
?>

    <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>Add Admin</h1>
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
              <form method="POST">
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
              <div >
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