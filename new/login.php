
<?php
 include 'inc/head.php';
include 'lib/user.php';
session::checklogin();
?>
<?php
$user=new user();
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])) {
  $usrlogin = $user->userlogin($_POST);
}

?>
  
  <?php
if (isset($usrlogin)) {
  echo $usrlogin;
}
  ?>

    <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1>Log In</h1>
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
           
              <form action="" method="POST">
                <div class="form-group">
                  <label for="email" class="form-control-label">Email</label>
             <input type="email" class="form-control" name="email" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                </div>
                <div class="form-group">
                  <label for="password" class="form-control-label">Password</label>
               <input type="password" name="password" class="form-control" placeholder="Password" required pattern=".{6,}" title="Six or more characters">
                </div>
                 
                <button type="submit" name="login" class="btn btn-success" >&nbsp&nbspLogIn&nbsp&nbsp</button> 
               
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


  