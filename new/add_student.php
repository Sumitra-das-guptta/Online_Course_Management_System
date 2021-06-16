<?php
  include 'inc/head.php';

   include 'lib/user.php';
?>
<?php
$user=new user();
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])) {
  $usrregi = $user->userregistration($_POST);
}

?>
    <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>Add Student</h1>
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
                  <label for="name" class="form-control-label"><b>Name</b></label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="name" />
                </div>
                 <div class="form-group">
                  <label for="name" class="form-control-label"><b>User Name</b></label>
                  <input type="text" id="username" class="form-control" name="username" placeholder="username" />
                </div>
                 <div class="form-group">
                  <label for="name" class="form-control-label"><b>Email Address</b></label>
                  <input type="text" id="email" class="form-control" name="email" placeholder="email" />
                </div>
                 <div class="form-group">
                  <label for="name" class="form-control-label"><b>Registration NO</b></label>
                  <input type="text" id="registration_no" class="form-control" name="registration_no" placeholder="roll" /> 
                </div>
                <div class="form-group">
                  <label for="department" class="form-control-label"><b>Department</b></label>
                   <select type="text" id="department" class="form-control" name="department" placeholder="department">
                    <option>CSE</option>
                    <option>EEE</option>
                    <option>ETE</option>
                    <option>CE</option>
                    <option>ME</option>
                    <option>MIE</option>
                    <option>PME</option>
                    <option>CWRE</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="category" class="form-control-label"><b>Semester</b></label>
                   <select type="text" id="semester" class="form-control" name="semester" placeholder="semester">
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
                  <label for="password" class="form-control-label"><b>Password</b></label>
                  <input type="password" id="password" class="form-control" name="password" placeholder="***" />
                </div> 
                
         <button type="submit" name="register" class="btn btn-success">&nbsp&nbsp Save &nbsp&nbsp</button>
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