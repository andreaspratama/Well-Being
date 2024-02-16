<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>WB</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{url('depan/assets/img/logo.png')}}" rel="icon">
  <link href="{{url('depan/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{url('depan/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{url('depan/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('depan/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{url('depan/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{url('depan/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{url('depan/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{url('depan/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{url('depan/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Updated: Jan 09 2024 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto" style="font-size: 20px;"><a href="{{route('homePoling')}}">
        <img src="{{url('depan/assets/img/logo.png')}}" alt="" style="margin-right: 10px"> WELL BEING 2024
      </a></h1>
      
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{route('homePoling')}}">Home</a></li>
          <li>
            @if (auth()->user()->role === 'guru')
                @if (auth()->user()->guru[0]->status === 'kecil')
                    <a class="nav-link scrollto" href="{{route('polingReportKecil')}}" style="margin-right: 20px">Report</a>
                @else
                    <a class="nav-link scrollto" href="{{route('polingReportBesar')}}" style="margin-right: 20px">Report</a>
                @endif
            @else
                <a class="nav-link scrollto" href="{{route('polingReportSiswa')}}" style="margin-right: 20px">Report</a>
            @endif
          </li>
          <li>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button class="btn log nav-link scrollto" style="background-color: transparent; border: 1px solid #47b2e4; padding: 8px 18px 8px 18px; color: #47b2e4;">Logout</button>
            </form>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1 style="font-size: 35px; margin-bottom: 30px">Welcome, {{auth()->user()->name}}</h1>
          <h1>We Want Your Feedback</h1>
          <h2>This feedback is used to improve learning at YSKI</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            @if (auth()->user()->role === 'guru')
                @if (auth()->user()->guru[0]->status === 'kecil')
                    <a href="{{route('polingIndex')}}" class="btn-get-started scrollto">Mulai Sekarang</a>
                @else
                    <a href="{{route('polingIndexBesar')}}" class="btn-get-started scrollto">Mulai Sekarang</a>
                @endif
            @else
                <a href="{{route('polingIndexSiswa')}}" class="btn-get-started scrollto">Mulai Sekarang</a>
            @endif
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="{{url('depan/assets/img/bg.png')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= Services Section ======= -->
    {{-- <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="">Lorem Ipsum</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Sed ut perspici</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Magni Dolores</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-layer"></i></div>
              <h4><a href="">Nemo Enim</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section --> --}}
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>YSKI</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
        Designed by <a href="#">Yayasan Sekolah Kristen Indonesia</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{url('depan/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{url('depan/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('depan/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{url('depan/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{url('depan/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{url('depan/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{url('depan/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{url('depan/assets/js/main.js')}}"></script>

</body>

</html>