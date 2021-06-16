<?php
$filepath= realpath(dirname(__FILE__));
include_once $filepath.'/../lib/session.php';
session::init();
//include_once $filepath.'/../lib/user.php';

$usertype=session::get("usertype");
?>

<html lang="en">
<head>
<title>Homepage Layout</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="homestyle.css">

<link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php
if (isset($_GET['action'])&& $_GET['action']=="logout") {
session::destroy();
}


?>

<body>
  
<div class="container" style=" width: 100%;
    height: 100px;
    background-image: url('back.jpg');
    background-size: 100% 100%;
    border: 1px solid red;">
  <center><img class="img-responsive" src="cuetlogo.png" alt="" width="70" height="70"></center>
          </div>   
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="homepage.php">Online Course Management</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
      	<?php
				$id=session::get("id");
				$userlogin=session::get("login");

				if ($userlogin==true) {
				
       ?>

  
        <li><a href="homepage.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Course <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <?php if($usertype=="admin"){ ?>
            <li><a href="save_course.php">Save Course</a></li>
          <?php } ?>
            <li><a href="view_course.php">View Course</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Teacher <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <?php if($usertype=="admin"){ ?>
            <li><a href="save_teacher.php">Save Teacher</a></li>
            <li><a href="assign_teacher.php">Assign Course</a></li>
            <li><a href="unassign_course.php">Unassign Course</a></li>
          <?php } ?>
            <li><a href="view_teacher.php">view teacher</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Student <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <?php if($usertype=="admin"){ ?>
            <li><a href="register.php">Add Student</a></li>
            <li><a href="add_admin.php">Add admin</a></li>
            
          <?php } ?>
            <li><a href="index.php">view student</a></li>
           
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Result<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <?php if($usertype=="admin" || $usertype=="teacher"){ ?>
            <li><a href="#">Save Result</a></li>
          <?php } ?>
            <li><a href="#">View Result</a></li>
          </ul>
        </li>
         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Classroom <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <?php if($usertype=="admin"){ ?>
            <li><a href="#">Allocate Room</a></li>
            <li><a href="#">Unallocate ClassRoom</a></li>
          <?php } ?>
            <li><a href="#">View Class Schedule</a></li>
          </ul>
        </li>
        <li><a href="#">About</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php?id=<?php echo $id;?>"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
        <li><a href="?action=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    
   <?php }else{
				?>
        <li><a href="homepage.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Course <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="view_course.php">View Course</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Teacher <span class="caret"></span></a>
          <ul class="dropdown-menu">
             <li><a href="view_teacher.php">view teacher</a></li>
          </ul>
        </li>
         <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Student <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="index.php">view student</a></li>
           
          </ul>
        </li>
        <li><a href="#">About</a></li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="login1.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li></ul>
        <?php }  ?>
      
    </div>
  </div>
</nav>