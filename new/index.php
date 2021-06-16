
<?php
 include 'lib/user.php';
 include 'inc/head.php';
//    session::checksession();

?>
<?php
$loginmsg = session::get("loginmsg");
if (isset($loginmsg)) {
  echo $loginmsg;
}
session::set("loginmsg",NULL);
?>
  <!-- Header Section  -->
  <header class="header" id="home">
    <div class="header__overlay">
      <div class="container header-container">
        <div class="row">
          <div class="col-md-12">
            <div class="header__logo text-center">
              <img src="img/cuetlogo-ooo.png" alt="logo">
            </div>
          </div>
        </div>
        <div>
          
             <h1 style="color:white;"><center>Chittagong University Of Engineering & Technnology</center> </h1><br>
            <div class="header__text">
             <center>
              <p style="font-size: 25px;">Welcome to ONLINE COURSE MANAGEMENT SYSTEM , Department Of CSE</p>
            </center></div>
               <?php
        $id=session::get("id");
        $userlogin=session::get("login");

        if ($userlogin==false) {
        
       ?>
           <center> <div class="header__btns">
              <a class="btn btn--download wow fadeInLeft" href="login.php" style="color:lightblue; ">LOGIN</a>
            
            </div></center>
         <?php } ?> 
       
        </div>
      </div>
    </div>
  </header>
  <!--   About Us Section   -->
  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-md-10 offset-md-1">
          <div class="about-section__title">
            <!-- About Title -->
            <h2>About Us</h2>
            <p>A course management system (CMS) is a collection of software tools providing an online environment for course interactions. A CMS typically includes a variety of online tools and environments, such as: An area for faculty posting of class materials such as course syllabus and handouts. A CMS is typically integrated with other databases in the university so that students enrolled in a particular course are automatically registered in the CMS as participants in that course. So we have tried to create such cms system for department of CSE,CUET.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="about-section-content__wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="about__iphone wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".5s">
              <img class="img-fluid" src="img/bigbiglogo.png" alt="stamp">
            </div>
          </div>
          <div class="col-md-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay=".5s">
            <div class="about__choose-us-title">
              <h2>Why Choose us?</h2>
              <p>This is online course management system where both teacher and student can use this site to have knowledge about different courses and handle them. It contains login system, course assign system.</p>
            </div>
            <div class="about__choose-us-des">
              <div class="about__choose-us--item">
                <div><i class="fa fa-check-square"></i></div>
                <h3>Usefulness</h3>
                <p>Now a days, number of educational institution is increasing. Huge number of students are studying in these institution and there are a lot of courses. Due to lack of manpower, it is difficult to manage these courses manually. The Online Course Management System is very efficient in this case.</p>
              </div>
              <div class="about__choose-us--item">
                <div><i class="fa fa-check-square"></i></div>
                <h3>Our Work</h3>
                <p>We can manage courses, publish result, assign course etc by this system. </p>
              </div>
              <div class="about__choose-us--item">
                <div><i class="fa fa-check-square"></i></div>
                <h3>Users</h3>
                <p>Both teacher and student can learn about their related courses from this website.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>





 




  <!-- Testimonials -->
  <section class="testimonial">
    <div class="testimonial__overlay">
      <div class="container">
        <div class="row">
          <div class="col-md-12 wow bounceInDown">
            <div id="carousel__testimonial" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carousel__testimonial" data-slide-to="0" class="active"></li>
                <li data-target="#carousel__testimonial" data-slide-to="1"></li>
                <li data-target="#carousel__testimonial" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active text-center">
                  <img src="img/vcnew.jpg" alt="testimonial" class="center-block">
                  <div class="testimonial__caption">
                    <h2>Prof. Dr. Mohammad Rafiqul Alam </h2>
                    <h4><span> Vice-Chancellor, </span>CUET</h4>
                    
                  </div>
                </div>
                <div class="carousel-item text-center">
                  <img src="img/shamshulnew.jpg" alt="testimonial" class="center-block">
                  <div class="testimonial__caption">
                    <h2>  Dr. Mohammad Shamsul Arefin</h2>
                    <h4><span> Professor & Head Of The Department, </span>CUET</h4>
                    
                  </div>
                </div>
                <div class="carousel-item text-center">
                  <img src="img/koushiknew.jpg" alt="testimonial" class="center-block">
                  <div class="testimonial__caption">
                    <h2>Dr. Kaushik Deb</h2>
                    <h4><span>  Professor Dept. of CSE 
& Dean, </span> Faculty of Electrical & Computer Engineering (ECE),CUET</h4>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

 <!--   Section Contact Us   -->
  <section class="contact__us" id="contact">
    <div class="container wow bounceIn">
      <div class="row">
        <div class="col-md-10 offset-md-1">
          
            <h2>&nbsp</h2>
           
          
        </div>
      </div>
    </div>
   
      <div class="container">
       
      </div>
  <br><br><br>
<br>  </section>

<!--  Counter Section  -->
  <section class="counter">
    <div class="counter__overlay">
      <div class="container wow bounceInLeft" data-wow-duration="1s">
        <div class="row text-center">
          <div class="col-md-3">
            <div class="counter__item">
              <div><i class="fa fa-users"></i></div>
              <h2><span class="counter__num"> 1020 </span><span>+</span></h2>
              <p>Student</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="counter__item">
              <div><i class="fa fa-graduation-cap"></i></div>
              <h2><span class="counter__num"> 35 </span><span>+</span></h2>
              <p>Teacher</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="counter__item">
              <div><i class="fa fa-users"></i></div>
              <h2><span class="counter__num"> 25 </span><span>+</span></h2>
              <p>Stuff</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="counter__item">
              <div><i class="fa fa-laptop"></i></div>
              <h2><span class="counter__num"> 9 </span><span>+</span></h2>
              <p>Laboratory</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



      <!-- i=Image Gallery  -->
    <section class="section-portfolieo">
      <div class="center-text margin-bottom--lg margin-top--md">
        <h2 style="font-size: 30px;color: rgba(50,90,100,0.8);"><center><b>
        Pictures and Gallery</b></center>
        </h2><br>
        <div class="icon-box">
         <center><i class="fa fa-image icon"></i></center>
        </div>
      </div>
      <div class="row no-gutters">
       <a href="img/cuetmukti.jpg" data-toggle="lightbox"><img src="img/cuetmukti.jpg" class="img-fluid" alt="pic-3" style="height: 404px; width: 600px;"></a>

        
        <a href="img/NHSPC1.jpg" data-toggle="lightbox"><img src="img/NHSPC1.jpg" class="img-fluid" alt="pic-5" style="height: 404px; width: 626px;"></a>

        <div class="col-md-3">
          <a href="img/cuetgate.jpg" data-toggle="lightbox"><img src="img/cuetgate.jpg" class="img-fluid" alt="pic-3" style="height: 202px; width: 350px;"></a>
          <a href="img/festrally.jpg" data-toggle="lightbox"><img src="img/festrally.jpg" class="img-fluid" alt="pic-4" style="height: 202px; width: 350px;"></a>
        </div>
        
        <div class="col-md-3">
          <div class="row no-gutters">
            
          </div>
          <div class="row no-gutters">
            <a href="img/muktinight.jpg" data-toggle="lightbox"><img src="img/muktinight.jpg" class="img-fluid" alt="pic-6" style="height: 404px;"></a>
          </div>
        </div>
          <div class="col-md-3">
          <a href="img/csefest152.jpg" data-toggle="lightbox"><img src="img/csefest152.jpg" class="img-fluid" alt="pic-5" style="height: 202px; width: 350px;"></a>
          <a href="img/cuetcampus.jpg" data-toggle="lightbox"><img src="img/cuetcampus.jpg" class="img-fluid" alt="pic-1" style="height: 202px; width: 350px;"></a>
          
           
        </div>
        <div class="col-md-3">
          
            <div class="row no-gutters"> 
       
            <a href="img/sar.jpg" data-toggle="lightbox"><img src="img/sar.jpg" class="img-fluid" alt="pic-5" style="height: 202px; width: 350px;"></a>
             <a href="img/pcs.jpg" data-toggle="lightbox"><img src="img/pcs.jpg" class="img-fluid" alt="pic-6" style="height: 202px; width: 350px;"></a>
        </div>
        </div>
         
       
      </div>


  
  <?php
     include 'inc/foot.php';

  ?>


 



 