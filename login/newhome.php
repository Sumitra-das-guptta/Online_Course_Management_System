
<?php
 include 'lib/user.php';
 include 'inc/newheader.php';
//    session::checksession();

?>
<?php
$loginmsg = session::get("loginmsg");
if (isset($loginmsg)) {
  echo $loginmsg;
}
session::set("loginmsg",NULL);
?>

<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/cuetmukti.jpg" alt="Los Angeles" width="1100" height="800" style="max-height: 450px;">
    </div>
    <div class="carousel-item">
      <img src="img/NHSPC1.jpg" alt="Chicago" width="1100" height="800" style="max-height: 450px;">
    </div>
    <div class="carousel-item">
      <img src="img/csefest2018.jpg" alt="New York" width="1100" height="800" style="max-height: 450px;">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

  
 



    <!-- showcase Section  -->
    <div id="showcase" class="py-5">
      <div class="primary-overlay text-white">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-sm-12 text-center wow bounceInLeft">
              <h1 class="display-2 mt-5 pt-5">Online Course Management System</h1>
              <p class="lead" style="font-size: 50px;">DEPARTMENT OF CSE,CUET</p>
              <a href="#" class="btn btn-success btn-large"><i class="fa fa-arrow-right"></i>login... </a>
            </div>
             
          </div>
        </div>
      </div>
    </div>

    <!-- Newsletter -->
    <section class="bg-inverse text-white py-5" id="newsLetter">
      <div class="container">
        
      </div>
    </section>

    <!-- Boxes -->
    <section id="boxes" class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-3 wow flipInY" data-wow-delay="0.3s">
            <div class="card text-center card-outline-primary">
              <div class="card-block">
                <h3 class="text-primary"><span class="counter__num">50</span><span>+</span></h3>
                <p class="text-muted" style="font-size: 25px;">teacher</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 wow flipInY" data-wow-delay="0.6s">
            <div class="card text-center card-primary text-white">
              <div class="card-block">
                <h3><span class="counter__num">600</span><span>+</span></h3>
                <p style="font-size: 25px;">student</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 wow flipInY" data-wow-delay="0.9s">
            <div class="card text-center card-outline-primary">
              <div class="card-block">
                <h3 class="text-primary"><span class="counter__num">40</span><span>+</span></h3>
                <p class="text-muted" style="font-size: 25px;">stuff</p>
              </div>
            </div>
          </div>
          <div class="col-md-3 wow flipInY" data-wow-delay="1.2s">
            <div class="card text-center card-primary text-white">
              <div class="card-block">
                <h3><span class="counter__num">1500</span><span>+</span></h3>
                <p style="font-size: 25px;">Downloads</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

   

    <!-- Authors  -->
    <section id="authors" class="my-5 text-center">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="info-header mb-5 wow fadeInRight">
              <h1 class="pb-5 text-primary">Meet the Authors</h1>
              <p class="lead pb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste laborum impedit esse tempore voluptatum, facere nemo itaque debitis! Tenetur, unde.</p>
            </div>

            <div class="row">
              <!-- Susan Williams -->
              <div class="col-lg-3 col-md-6 wow bounceInDown" data-wow-delay="0.3s">
                <div class="card">
                  <div class="card-block">
                    <img src="img/vcnew.jpg" alt="Susan" class="img-fluid rounded-circle mb-4 w-50">
                    <h4>Rafikul Alam</h4>
                    <h5 class="text-muted">Vice Cancellor</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati excepturi voluptate distinctio, dolore quibusdam repudiandae.</p>
                    <div class="d-flex flex-row justify-content-center">
                      <div class="p-4">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                      </div>
                      <div class="p-4">
                        <a href="#"><i class="fa fa-twitter"></i></a>
                      </div>
                      <div class="p-4">
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <!--  Grace Smith  -->
              <div class="col-lg-3 col-md-6 wow bounceInDown" data-wow-delay="0.6s">
                <div class="card">
                  <div class="card-block">
                    <img src="img/shamshulnew.jpg" alt="Grace" class="img-fluid rounded-circle mb-4 w-50">
                    <h4>Md. Shamshul Arefin</h4>
                    <h5 class="text-muted">Department Head</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati excepturi voluptate distinctio, dolore quibusdam repudiandae.</p>
                    <div class="d-flex flex-row justify-content-center">
                      <div class="p-4">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                      </div>
                      <div class="p-4">
                        <a href="#"><i class="fa fa-twitter"></i></a>
                      </div>
                      <div class="p-4">
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!--  Kevin Swanson   -->
              <div class="col-lg-3 col-md-6 wow bounceInDown" data-wow-delay="0.9s">
                <div class="card">
                  <div class="card-block">
                    <img src="img/koushiknew.jpg" alt="Kevin" class="img-fluid rounded-circle mb-4 w-50">
                    <h4>Koushik Deb</h4>
                    <h5 class="text-muted">Din</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati excepturi voluptate distinctio, dolore quibusdam repudiandae.</p>
                    <div class="d-flex flex-row justify-content-center">
                      <div class="p-4">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                      </div>
                      <div class="p-4">
                        <a href="#"><i class="fa fa-twitter"></i></a>
                      </div>
                      <div class="p-4">
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                <!--  John Doe  -->
              <div class="col-lg-3 col-md-6 wow bounceInDown" data-wow-delay="1.2s">
                <div class="card">
                  <div class="card-block">
                    <img src="img/mashiulnew.jpg" alt="John" class="img-fluid rounded-circle mb-4 w-50">
                    <h4>Mashiul Hoque</h4>
                    <h5 class="text-muted">Editor</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati excepturi voluptate distinctio, dolore quibusdam repudiandae.</p>
                    <div class="d-flex flex-row justify-content-center">
                      <div class="p-4">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                      </div>
                      <div class="p-4">
                        <a href="#"><i class="fa fa-twitter"></i></a>
                      </div>
                      <div class="p-4">
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>


      <!-- i=Image Gallery  -->
    <section class="section-portfolieo">
      <div class="center-text margin-bottom--lg margin-top--md">
        <h2 class="heading-secondary">
        Pictures and Gallery
        </h2>
        <div class="icon-box">
         <center><i class="fa fa-image icon"></i></center>
        </div>
      </div>
      <div class="row no-gutters">
       <a href="img/cuetmukti.jpg" data-toggle="lightbox"><img src="img/cuetmukti.jpg" class="img-fluid" alt="pic-3" style="height: 404px; width: 600px;"></a>

        
        <a href="img/NHSPC1.jpg" data-toggle="lightbox"><img src="img/NHSPC1.jpg" class="img-fluid" alt="pic-5" style="height: 404px; width: 626px;"></a>

        <div class="col-md-3">
          <a href="img/contest.jpg" data-toggle="lightbox"><img src="img/contest.jpg" class="img-fluid" alt="pic-3" style="height: 202px; width: 350px;"></a>
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


    </section>
<?php
include 'newfooter.php';

?>

   
  