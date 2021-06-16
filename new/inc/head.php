<?php
$filepath= realpath(dirname(__FILE__));
include_once $filepath.'/../lib/session.php';
//include 'lib/session.php';
session::init();
//include_once $filepath.'/../lib/user.php';

$usertype=session::get("usertype");
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--  Basic SEO Optimization  -->
  <meta name="description" content="Simple, clean, responsive website built with html5, CSS3, Js, jQuery and Bootstrap">
  <meta name="keywords" content="web, design, html, css, html5, css3, javascript, jquery, bootstrap, development">
  <!--  Google Fonts  -->
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <!-- Favicon img -->
  <link rel="icon" type="image/png" href="img/log.png">
  <!--  Font Awesome  -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <!--  Bootstrap   -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- BX Slider -->
  <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
  <!-- Animate CSS -->
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <!-- Stylesheet  -->
  <link rel="stylesheet" type="text/css" href="css/newstyle.css">
  <title>Online Course Management</title>
</head>
<?php
if (isset($_GET['action'])&& $_GET['action']=="logout") {
session::destroy();
}


?>

<body>
  <!--  Navbar  -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="rafat">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="img/cuetlogo-ooo.png" alt="logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#loso_navbar" aria-controls="loso_navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="loso_navbar">
        <ul class="navbar-nav ml-auto">
          <?php
        $id=session::get("id");
        $userlogin=session::get("login");

        if ($userlogin==true) {
        
       ?>

          <li class="nav-item"><a class="nav-link menu" href="index.php">HOME</a></li>
          <li class="nav-item"><a class="nav-link menu" href="#about">ABOUT</a></li>
          
           <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size: 14px;padding-right: 0.1px;"><i></i>COURSE</a>
            <div class="dropdown-menu">
               <?php if($usertype=="admin"){ ?> 
              <a href="save_course.php" class="dropdown-item">
                <i></i>NEW COURSE
              </a>
                 <?php } ?>
              <a href="view_course.php" class="dropdown-item">
                <i></i> VIEW COURSE
              </a>
             
            </div>
          </li>
            <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size: 14px;padding-right: 0.1px;"><i></i>STUDENT</a>
            <div class="dropdown-menu">
                      <?php if($usertype=="admin"){ ?>
              <a href="add_student.php" class="dropdown-item">
                <i></i> ADD STUDENT
              </a>
               <a href="add_admin.php" class="dropdown-item">
                <i></i> ADD ADMIN
              </a>
             
                <?php } ?>
              <a href="view_student.php" class="dropdown-item">
                <i></i> VIEW STUDENT
              </a>
               
             
            </div>
          </li>
            <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size: 14px;padding-right: 0.1px;"><i></i>TEACHER</a>
            <div class="dropdown-menu">
                <?php if($usertype=="admin"){ ?>
              <a href="save_teacher.php" class="dropdown-item">
                <i></i> ADD TEACHER
              </a>
              <a href="assign_teacher.php" class="dropdown-item">
                <i></i> ASSIGN COURSE
              </a>
              <a href="unassign_course.php" class="dropdown-item">
                <i></i> UNASSIGN COURSE
              </a>
                 <?php } ?>
              <a href="view_teacher.php" class="dropdown-item">
                <i></i> VIEW TEACHER
              </a>
            </div>
          </li>
          <li class="nav-item"><a href="profile.php?id=<?php echo $id;?>"class="nav-link menu">PROFILE</a></li>
           <li class="nav-item"><a href="?action=logout" class="nav-link menu">LOGOUT</a></li>
           <?php }else{
        ?>
         <li class="nav-item"><a class="nav-link menu" href="index.php">HOME</a></li>
          <li class="nav-item"><a class="nav-link menu" href="#about">ABOUT</a></li>
           <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size: 14px;padding-right: 0.1px;"><i></i>COURSE</a>
            <div class="dropdown-menu">
               
            
              <a href="view_course.php" class="dropdown-item">
                <i></i> VIEW COURSE
              </a>
             
            </div>
          </li>
           <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size: 14px;padding-right: 0.1px;"><i></i>STUDENT</a>
            <div class="dropdown-menu">
               
            
              <a href="view_student.php" class="dropdown-item">
                <i></i> VIEW STUDENT
              </a>
             
            </div>
          </li>
           <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" style="font-size: 14px;padding-right: 0.1px;"><i></i>TEACHER</a>
            <div class="dropdown-menu">
               
            
              <a href="view_teacher.php" class="dropdown-item">
                <i></i> VIEW TEACHER
              </a>
             
            </div>
          </li>
          <li class="nav-item"><a class="nav-link menu" href="login.php">LOGIN</a></li>
             <?php }  ?>
        </ul>
      </div>
    </div>
  </nav>
  


