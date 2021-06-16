
<?php
  include 'inc/head.php';

  include 'lib/user.php';
?>
<?php
$user=new user();
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])) {
  $usrregi = $user->courseregistration($_POST);
}

?>
    <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>New Course</h1>
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
      
            
            <div class="card-block" style="padding-left: 120px;padding-right: 120px;padding-bottom: 30px;padding-top: 30px;">
              <?php
        if (isset($usrregi)) {
          echo $usrregi;
        }

        ?>
    <form action="" method="POST">
                <div class="form-group">
                  <label for="name" class="form-control-label"><b>Course Code</b></label>
                   <input type="text" id="coursecode" class="form-control" name="coursecode" placeholder="code" />
                </div>
                <div class="form-group">
                  <label for="name" class="form-control-label"><b>Course Title/Name</b></label>
        <input type="text" id="coursetitle" class="form-control" name="coursetitle" placeholder="course title" />
                </div>
                  <div class="form-group">
                  <label for="category" class="form-control-label"><b>Semester</b></label>
                   <select type="text" id="semester" class="form-control" name="semester">
                    <option>L1-T1</option>
                    <option>L1-T2</option>
                    <option>L2-T1</option>
                    <option>L2-T2</option>
                    <option>L3-T1</option>
                    <option>L3-T2</option>
                    <option>L4-T1</option>
                    <option>L4-T2</option>
                  </select>
                </div>
               
                <div class="form-group">
                  <label for="emaik" class="form-control-label"><b>Credit</b></label>
                <input type="text" id="credit" class="form-control" name="credit" placeholder="credit" />
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