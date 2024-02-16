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
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto" style="font-size: 20px;"><a href="{{route('homePoling')}}">
        <img src="{{url('depan/assets/img/logo.png')}}" alt="" style="margin-right: 10px"> WELL BEING 2024
      </a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="{{route('homePoling')}}">Home</a></li>
          <li>
              @if (auth()->user()->guru[0]->status === 'kecil')
                  <a class="nav-link scrollto" href="{{route('polingReportKecil')}}" style="margin-right: 20px">Report</a>
              @else
                  <a class="nav-link scrollto" href="{{route('polingReportBesar')}}" style="margin-right: 20px">Report</a>
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

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="{{route('homePoling')}}">Home</a></li>
          <li>Feedback</li>
        </ol>
        <h2>Feedback</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">Feedback</h3>
              <h3 class="block-title">{{$tgl}}</h3>
            </div>
            <div class="block-content block-content-full">
              <form action="{{route('polingStore')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row push">
                  <div class="col-lg-4">
                    <p class="fs-sm text-muted">
                      Silahkan isikan feedback kalian disini
                    </p>
                    <!--{{$waktuCek}}-->
                    
                    <!--@if($waktuCek >= '09:40:00')-->
                    <!--    echo Dibuka;-->
                    <!--@else-->
                    <!--    echo Ditutup;-->
                    <!--@endif-->
                  </div>
                  <div class="col-lg-8 col-xl-5">
                    <div class="mb-4">
                      <label class="form-label" for="example-select" style="margin-bottom: 10px; font-weight: bold; text-transform: uppercase">Nama <span style="color: red; font-size: 10px">(*Wajib Diisi)</span></label>
                      <select class="form-select @error('siswa_id') is-invalid @enderror" id="example-select" name="siswa_id" required>
                        <option selected="">-- Silahkan Pilih Nama --</option>
                        @foreach ($siswa as $sw)
                            @if (auth()->user()->guru[0]->kelas === $sw->kelas)
                                <option value="{{$sw->id}}">{{$sw->nama}}</option>
                            @endif
                        @endforeach
                      </select>
                      @error('siswa_id')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row push">
                  <div class="col-lg-4">
                  </div>
                  <div class="col-lg-8 col-xl-5">
                    <div class="mb-3">
                      <label class="form-label" style="margin-bottom: 30px; font-weight: bold; text-transform: uppercase">Feedback <span style="color: red; font-size: 10px">(*Wajib Diisi)</span></label>
                      <div class="space-x-2">
                        @foreach ($feed as $fd)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input @error('feed_id') is-invalid @enderror" type="radio" name="feed_id" id="{{$fd->nama}}" value="{{$fd->id}}">
                                <label class="form-check-label" for="{{$fd->nama}}">
                                    <img src="{{Storage::url($fd->gambar)}}" alt="" style="width: 70px">
                                </label>
                            </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row push">
                  <div class="col-lg-4">
                  </div>
                  <div class="col-lg-8 col-xl-5">
                    <div class="mb-5">
                      <label for="exampleFormControlTextarea1" class="form-label" style="margin-bottom: 20px; font-weight: bold; text-transform: uppercase">Cerita Hari Ini <span style="color: red; font-size: 10px">(*Tidak Wajib Diisi)</span></label>
                      <textarea class="form-control @error('cerita') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="cerita" value="{{ old('cerita') }}"></textarea>
                      @error('cerita')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                      @enderror
                    </div>
                  </div>
                </div>
                <div class="row push">
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-8 col-lx-5">
                        <button type="submit" class="btn btn-kirim" style="background-color: #37517e; color: #fff; padding: 8px 18px 8px 18px">Kirim</button>
                    </div>
                </div>
              </form>
            </div>
        </div>
      </div>
    </section>

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
        Designed by <a href="https://bootstrapmade.com/">Yayasan Sekolah Kristen Indonesia</a>
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

