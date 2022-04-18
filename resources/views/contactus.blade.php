<!DOCTYPE html>

  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/style-rtl.css') }}" rel="stylesheet">

<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  
    Document Title
    =============================================
    -->
    <title>ReLO Contact Us</title>
    <!--  
    Favicons
    =============================================
    -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicons/favicon.ico')}}">
    <!--  
    Stylesheets
    =============================================
    
    -->
    <!-- Default stylesheets-->
    <link href="{{ asset('assets/lib/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="{{ asset('assets/lib/animate.css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/lib/components-font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/lib/et-line-font/et-line-font.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/lib/flexslider/flexslider.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owl.carousel/dist/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/lib/magnific-popup/dist/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/lib/simple-text-rotator/simpletextrotator.css')}}" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
    <link id="color-scheme" href="{{ asset('assets/css/colors/default.css')}}" rel="stylesheet">
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <nav class="navbar navbar-custom navbar-fixed-top navbar-transparent" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
              <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
              <a class="navbar-brand" href="{{ url('/') }}">ReLO</a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
  


         
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Services</a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="">For companies</a></li>
                  <li><a href="">For EV users</a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Company</a>
                <ul class="dropdown-menu" role="menu">
                   <li><a href="{{ route('companyinfo') }}">Information</a></li>
                  <li><a href="{{ route('contactus') }}">Contact</a></li>
                </ul>
              </li>

              <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Login</a>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('register') }}">Register</a></li>
                  <li><a href="{{ url('/loginregister') }}">Login-Companies</a></li>
                  <li><a href="{{ route('login') }}">Login-users</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
      <section class="module bg-dark-60 about-page-header" data-background="{{ asset('assets/images/landing/office.jpg')}}">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
              <h2 class="module-title font-alt">CONTACT US</h2>
              <div class="module-subtitle font-serif">We make EV users’ life more stress-free.<br>
                With our service, you can charge your EV
                when you need, where you need. </div>
            </div>
          </div>
        </div>
      </section>

       


      <div class="main">


        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <h4 class="font-alt">Get in touch</h4><br/>
                <form id="contactForm" role="form" method="post" action="php/contact.php">
                  <div class="form-group">
                    <label class="sr-only" for="name">Name</label>
                    <input class="form-control" type="text" id="name" name="name" placeholder="Your Name*" required="required" data-validation-required-message="Please enter your name."/>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="email">Email</label>
                    <input class="form-control" type="email" id="email" name="email" placeholder="Your Email*" required="required" data-validation-required-message="Please enter your email address."/>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" rows="7" id="message" name="message" placeholder="Your Message*" required="required" data-validation-required-message="Please enter your message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="text-center">
                    <button class="btn btn-block btn-round btn-d" id="cfsubmit" type="submit">Submit</button>
                  </div>
                </form>
                <div class="ajax-response font-alt" id="contactFormResponse"></div>
              </div>
              <div class="col-sm-6">
                <h4 class="font-alt">Office</h4><br/>
                <p>6-1, Marunouchi 2-Chome, Chiyoda-ku, Tokyo, 100-8086<br>
                  Phone: +81-3-3210-2121</p>
                <hr/>
                <h4 class="font-alt">Business Hours</h4><br/>
                <ul class="list-unstyled">
                  <li>Mon - Fri: 8am to 6pm</li>
                  <li>Sat, Sun: 10am to 2pm</li>
                </ul>
              </div>
            </div>
          </div>
        </section>
        <section id="map-section">
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.931526508358!2d139.75989080058287!3d35.678687980097735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188bf07f000001%3A0x453bfabe0bef474a!2sMarunouchi%20Park%20Building!5e0!3m2!1sen!2sjp!4v1649595597806!5m2!1sen!2sjp" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                   </div>
        </section>
        
       

        <footer class="footer bg-dark">
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <p class="copyright">&copy; 2022&nbsp; ReLO, All Rights Reserved</p>
              </div>
              <div class="col-sm-6">
                <div class="footer-social-links"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a><a href="#"><i class="fa fa-skype"></i></a>
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>
    <!--  
    JavaScripts
    =============================================
    -->
    <script src="{{ asset('assets/lib/jquery/dist/jquery.js')}}"></script>
    <script src="{{ asset('assets/lib/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/lib/wow/dist/wow.js')}}"></script>
    <script src="{{ asset('assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js')}}"></script>
    <script src="{{ asset('assets/lib/isotope/dist/isotope.pkgd.js')}}"></script>
    <script src="{{ asset('assets/lib/imagesloaded/imagesloaded.pkgd.js')}}"></script>
    <script src="{{ asset('assets/lib/flexslider/jquery.flexslider.js')}}"></script>
    <script src="{{ asset('assets/lib/owl.carousel/dist/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/lib/smoothscroll.js')}}"></script>
    <script src="{{ asset('assets/lib/magnific-popup/dist/jquery.magnific-popup.js')}}"></script>
    <script src="{{ asset('assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js')}}"></script>
    <script src="{{ asset('assets/js/plugins.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>
  </body>
</html>
