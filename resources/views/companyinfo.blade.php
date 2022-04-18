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
    <title>ReLO Company Info</title>
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
                  <li><a href="#">For companies</a></li>
                  <li><a href="#">For EV users</a></li>
                </ul>
              </li>
              <li class="dropdown"><a class="dropdown-toggle" href="" data-toggle="dropdown">Company</a>
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
              <h2 class="module-title font-alt">COMPANY</h2>
              <div class="module-subtitle font-serif">We make EV users’ life more stress-free.<br>
                With our service, you can charge your EV
                when you need, where you need. </div>
            </div>
          </div>
        </div>
      </section>

       


      <div class="main">



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
