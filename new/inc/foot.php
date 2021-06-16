 

 <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div id="copyright">
            <p>©copyright : Sumitra & Tasfia <a href="#"> - contact us</a></p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="scroll-top">
            <a href="#"><i class="fa fa-angle-up"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>
   <!-- Link JQUERY File -->
  <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <!-- Link Bootstrap JS File  -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <!-- BX Slider -->
  <script src="js/jquery.bxslider.min.js"></script>
  <!-- Add JS Counter Library -->
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.counterup.min.js"></script>
  <!-- Add wow js lib -->
  <script src="js/wow.min.js"></script>
  <!--  Custom JS  -->
  <script>
    /* Auto Hide & Show Navigation Bar  */
    window.onscroll = function() {
      var currentScrollPos = window.pageYOffset;
      if (currentScrollPos > 80) {
        document.getElementById("rafat").style.top = "0";
        document.getElementById("rafat").style.opacity = "1";
      } else {
        document.getElementById("rafat").style.top = "-100px";
        document.getElementById("rafat").style.opacity = "0";
      }
    };

    /*  Add Smooth Scrolling  */
    $(document).ready(function() {
      $("a").on('click', function(event) {
        if (this.hash !== "") {
          event.preventDefault();
          var hash = this.hash;
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function() {
            window.location.hash = hash;
          });
        }
      });
    });

    /*  Highlight Menu Items On Scroll & Active Items */
    $(document).ready(function() {
      'use strict';
      $(window).scroll(function() {
        'use strict';
        $("section").each(function() {
          'use strict';
          var bb = $(this).attr("id"); // ABOUT, CONTACT, DOWNLOAD
          var hei = $(this).outerHeight();
          var grttop = $(this).offset().top - 70;
          if ($(window).scrollTop() > grttop && $(window).scrollTop() < grttop + hei) {
            $(".navbar-nav li a[href='#" + bb + "']").parent().addClass("active");
          } else {
            $(".navbar-nav li a[href='#" + bb + "']").parent().removeClass("active");
          }
        });
      });
    });

    // Add Auto Padding to Header
    $(document).ready(function() {
      'use strict';
      setInterval(function() {
        'use strict';
        var windowHeight = $(window).height();
        var containerHeight = $(".header-container").height();
        var padTop = windowHeight - containerHeight;
        $(".header-container").css({
          'padding-top': Math.round(padTop / 2) + 'px',
          'padding-bottom': Math.round(padTop / 2) + 'px'
        });
      }, 10)
    });

    // Add BX Slider to Screen Sextion Images
    $(document).ready(function() {
      $('.bxslider').bxSlider({
        slideWidth: 292.5,
        auto: true,
        minSlides: 1,
        maxSlides: 3,
        slideMargin: 50
      });
    });

    // Add counter
    $(document).ready(function() {

      $('.counter__num').counterUp({
        delay: 15,
        time: 2500
      });
    });

    // Add animation/ Initialize Woo
    $(document).ready(function() {
      'use strict';
      new WOW().init();

    });
  </script>
  <!--  Get the Current year for the copyright  -->
  <script>
    $('#year').text(new Date().getFullYear());
  </script>

  <script src="js/tether.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
  <script>
    CKEDITOR.replace('editor1');
  </script>

</body>

</html>
