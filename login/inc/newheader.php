<?php
$filepath= realpath(dirname(__FILE__));
include_once $filepath.'/../lib/session.php';
session::init();
//include 'lib/user.php';
//session::checklogin();
//include_once $filepath.'/../lib/user.php';

$usertype=session::get("usertype");
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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" />
  <link rel="stylesheet" href="css/animate.min.css">
    <!--  Google Fonts  -->
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <!-- Favicon img -->
  <link rel="icon" type="image/png" href="img/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
  
  
  <!-- BX Slider -->
  <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
  <!-- Animate CSS -->
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <title>course management</title>
   <style>
  /* Make the image fully responsive */
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }
  </style>
</head>
<?php
if (isset($_GET['action'])&& $_GET['action']=="logout") {
session::destroy();
}


?>

<body id="home">

  <!-- Navbar -->
  <nav class="navbar navbar-toggleable-md navbar-light fixed-top py-4">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a href="#" class="navbar-brand">
        <img src="img/cuetlogo.png" alt="Brand_name" height="50" width="70">
        <h3 class="d-inline align-middle">CUET</h3>
      </a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
        	<?php
				$id=session::get("id");
				$userlogin=session::get("login");

				if ($userlogin==true) {
				
       ?>

          <li class="nav-item">
            <a href="newhome.php" class="nav-link" style="font-size: 14px;padding-right: 0.3px;">Home</a>
          </li>
         
          <li class="nav-item">
            <a href="#authors" class="nav-link" style="font-size: 14px;padding-right: 0.3px;">Meet the Authors</a>
          </li>
          <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size: 14px;padding-right: 0.3px;"><i class="fa fa-graduation-cap" style="shape-image-threshold: 3px;"></i> Courses</a>
            <div class="dropdown-menu">
             <?php if($usertype=="admin"){ ?>
              <a href="profile.html" class="dropdown-item">
                <i class="fa fa-user-circle"></i> Save Course
              </a>
               <?php } ?>
              <a href="settings.html" class="dropdown-item">
                <i class="fa fa-gear"></i> View Course
              </a>
            </div>
          </li>
          <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size: 14px;padding-right: 0.1px;"><i class="fa fa-user"></i>Teachers</a>
            <div class="dropdown-menu">
            	 <?php if($usertype=="admin"){ ?>
              <a href="profile.html" class="dropdown-item">
                <i class="fa fa-user-circle"></i> Add Teacher
              </a>
              <a href="profile.html" class="dropdown-item">
                <i class="fa fa-user-circle"></i> Assign Course
              </a>
              <a href="profile.html" class="dropdown-item">
                <i class="fa fa-user-circle"></i> Unassign Course
              </a>
               <?php } ?>
              <a href="settings.html" class="dropdown-item">
                <i class="fa fa-gear"></i> View Teacher
              </a>
            </div>
          </li>
           <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size: 14px;padding-right: 0.1px;"><i class="fa fa-user"></i> Student</a>
            <div class="dropdown-menu">
            	<?php if($usertype=="admin"){ ?>
              <a href="profile.html" class="dropdown-item">
                <i class="fa fa-user-circle"></i> Add Student
              </a>
              <a href="profile.html" class="dropdown-item">
                <i class="fa fa-user-circle"></i> Add Admin
              </a>
              <?php } ?>
              <a href="settings.html" class="dropdown-item">
                <i class="fa fa-gear"></i> View Student
              </a>
            </div>
          </li>
           <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size: 14px;padding-right: 0.1px;"><i class="fa fa-user"></i> Result</a>
            <div class="dropdown-menu">
            <?php if($usertype=="admin" || $usertype=="teacher"){ ?>
              <a href="profile.html" class="dropdown-item">
                <i class="fa fa-user-circle"></i> Save Result
              </a>
              <?php } ?>
              <a href="settings.html" class="dropdown-item">
                <i class="fa fa-gear"></i> View Result
              </a>
            </div>
          </li>
          
          <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size: 14px;padding-right: 0.1px;"><i class="fa fa-user"></i> Classroom</a>
            <div class="dropdown-menu">
            	   <?php if($usertype=="admin"){ ?>
              <a href="profile.html" class="dropdown-item">
                <i class="fa fa-user-circle"></i> Allocate Classroom
              </a>
               <?php } ?>
              <a href="settings.html" class="dropdown-item">
                <i class="fa fa-gear"></i> Unallocate Classroom
              </a>
              <a href="profile.html" class="dropdown-item">
                <i class="fa fa-user-circle"></i> View Class Schedule
              </a>
            </div>
          </li>
           <li class="nav-item">
            <a href="#about" class="nav-link" style="font-size: 14px;padding-right: 0.3px;">About</a>
          </li>
          <li class="nav-item">
            <a href="profile.php?id=<?php echo $id;?>" class="nav-link" style="font-size: 14px;padding-right: 0.3px;">Profile</a>
          </li>
          <li class="nav-item">
            <a href="?action=logout" class="nav-link" style="font-size: 14px;padding-right: 0.3px;"><i class="fa fa-user-plus"></i>Logout</a>
          </li>
          <?php }else{
				?>
				 <li class="nav-item">
            <a href="newhome.php" class="nav-link" style="font-size: 14px;padding-right: 0.3px;">Home</a>
          </li>
         
          <li class="nav-item">
            <a href="#authors" class="nav-link" style="font-size: 14px;padding-right: 0.3px;">Meet the Authors</a>
          </li>
          <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size: 14px;padding-right: 0.3px;"><i class="fa fa-graduation-cap"></i> Courses</a>
            <div class="dropdown-menu">
            
              <a href="settings.html" class="dropdown-item">
                <i class="fa fa-gear"></i> View Course
              </a>
            </div>
          </li>
          <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size: 14px;padding-right: 0.3px;"><i class="fa fa-graduation-cap"></i> Teachers</a>
            <div class="dropdown-menu">
             
              <a href="settings.html" class="dropdown-item">
                <i class="fa fa-gear"></i> View Teachers
              </a>
            </div>
          </li>
          <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size: 14px;padding-right: 0.3px;"><i class="fa fa-graduation-cap"></i> Students</a>
            <div class="dropdown-menu">
             
              <a href="settings.html" class="dropdown-item">
                <i class="fa fa-gear"></i> View Students
              </a>
            </div>
          </li>
            <li class="nav-item">
            <a href="#about" class="nav-link" style="font-size: 14px;padding-right: 0.3px;">About</a>
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link" style="font-size: 14px;padding-right: 0.3px;" data-toggle="modal" data-target="#loginModal">
              <i class="fa fa-user-plus"></i> Login
            </a>
          </li>
            <?php }  ?>
          
        </ul>

      </div>

    </div>

  </nav>
  <!-- Log in Modal -->
    <div class="modal fade" id="loginModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title" id="contactModalLabel">Login</h1>
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form action="" method="POST">
              <div class="form-group">
                <div class="input-group input-group-lg">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="email" class="form-control" name="email" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                </div>
              </div>
              <div class="form-group">
                <div class="input-group input-group-lg">
                  <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                  <input type="password" name="password" class="form-control" placeholder="Password" required pattern=".{6,}" title="Six or more characters">
                </div>
              </div>
              <div class="form-group form-check">
                &nbsp&nbsp &nbsp&nbsp &nbsp&nbsp<input type="checkbox" class="form-check-input ckh-rem" name="remember" id="remember">
                <label class="form-check-label" for="remember" id="lbl-rem">Remember me</label>
              </div>
              <button type="submit" class="btn btn-outline-success btn-block mt-5" id="logbtn" name="login">Submit</button>
            </form>
          </div>
          <a href="#" class="for-pass" style="padding-bottom: 10px;padding-left: 10px;">Forgot Password?</a>
        </div>
      </div>
    </div>