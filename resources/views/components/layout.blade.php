
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>AdServer</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Vendor CSS Files -->
    <link href="/vendor/aos/aos.css" rel="stylesheet">
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link rel="stylesheet" href="/vendor/feather/feather.css">
  <link rel="stylesheet" href="/vendor/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="/vendor/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="/vendor/ti-icons/css/themify-icons.css">
  <link rel="icon" href="/img/advertising-64.png">
  {{-- <link rel="stylesheet" type="text/css" href="/js/select.dataTables.min.css"> --}}
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  
  
  
  
  <link href="/css/layout.css" rel="stylesheet">
  <link href="/css/dashboard.css" rel="stylesheet">
  <link href="/css/login-form.css", rel="stylesheet">
  <link href="/css/filter.css", rel="stylesheet">
  
  
  <link rel="stylesheet" href="/css/virtual-select.min.css" />
  <link rel="stylesheet" href="/css/choices.min.css" />
  
  
  <script src="//unpkg.com/alpinejs" defer></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            laravel: '#ef3b2d',
          },
        },
      },
    }
    </script>
  <script type="text/javascript" src="/js/virtual-select.min.js"></script>
  <script type="text/javascript" src="/js/choices.min.js"></script>
</head>

<body>
  @isset($username)
  <x-topbar :username="$username"/>
  @else
  <x-topbar />
  @endisset
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="logo">
        <h1><a href="/"><x-header_title /></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
        @if(!isset($simpleheader) || $simpleheader == false)
        <nav id="navbar" class="navbar">
          <ul>
              <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
              <li><a class="nav-link scrollto" href="#about">About</a></li>
              <li><a class="nav-link scrollto" href="#services">Services</a></li>
              <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
              <li><a class="nav-link scrollto" href="#team">Team</a></li>
              <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li>
              <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
              @if(!isset($username) || $username == "")
                <li> <a class="getstarted scrollto" href="/login"> Get Started</a></li>
                @else
                <li> <a class="getstarted scrollto" href="/advertiser/dashboard"> Dashboard</a></li>
              @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
          @endif
      </div>
    </header><!-- End Header -->
   
  {{$slot}}
  <!-- ======= Footer ======= -->
  @if(!isset($footer) || $footer == true)
  <footer id="footer">
    <div class="container">
        <div class="row d-flex align-items-center">
          <div class="col-lg-6 text-lg-left text-center position-absolute">
            <div class="copyright">
              &copy; Copyright <strong><x-header_title /></strong>. All Rights Reserved
            </div>
            <div class="credits">
            </div>
          </div>
          <div class="col-lg-6 position-absolute ml-96">
            <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
              <a href="#intro" class="scrollto">Home</a>
              <a href="#about" class="scrollto">About</a>
              <a href="#">Privacy Policy</a>
                <a href="#">Terms of Use</a>
              </nav>
            </div>
        </div>
      </div>
    </footer>
  @endif
  

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <x-flash-message />
  <!-- Vendor JS Files -->
  <script src="/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/vendor/aos/aos.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="/vendor/php-email-form/validate.js"></script>
  
  <!-- Template Main JS File -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> 
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
  
  
  <script src="/js/jquery-2.1.1.js"></script> 
  <script src="/js/jquery.mixitup.min.js"></script> 
  <script src="/js/filter.js"></script> 
  
  <script src="/vendor/js/vendor.bundle.base.js"></script>
<script src="/js/login-form.js"></script>
<script src="/js/dashboard.js"></script>
<script src="/js/template.js"></script>
<script src="/js/main.js"></script>
<script src="/js/lazyload.js"></script>

</body>

</html>