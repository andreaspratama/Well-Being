<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>WB</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

  <!-- Template Main CSS File -->
  <link href="{{url('depan/assets/css/style.css')}}" rel="stylesheet">
  <style>
    #container {
    height: 400px;
    }

    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

  </style>
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
          <li class="dropdown"><a href="#"><span>Report</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a class="nav-link scrollto" href="{{route('polingReportBesar')}}" style="margin-right: 20px">Report Semua Siswa</a></li>
              <li><a href="{{route('reportPerSiswa')}}">Report Per Siswa</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="{{route('gantiPass')}}" style="margin-right: 20px">Ganti Password</a></li>
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
          <li><a href="{{route('reportPerSiswa')}}">Kembali Ke Kelas</a></li>
        </ol>
        <h2>Feedback</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <div class="mb-3">
        </div>
        <h3 style="margin-bottom: 30px">Report Feedback</h3>
        <figure class="highcharts-figure">
          <div id="container"></div>
        </figure>
        <div class="block-content">
            <a href="{{route('cetakPdfBesar', $item->id)}}" class="btn btn-danger mt-2">Cetak PDF</a>
            <div class="table-responsive mt-4">
              <table class="table table-bordered table-striped table-vcenter text-center" id="table">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 5%;">No</th>
                    <th class="text-center" style="width: 20%;">Nama</th>
                    <th class="text-center" style="width: 20%;">Feed</th>
                    <th class="text-center" style="width: 20%;">Cerita</th>
                    <th class="text-center" style="width: 20%;">Tanggal</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($item->polingdua as $ip)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$ip->siswa->nama}}</td>
                            <td>{{$ip->feed->nama}}</td>
                            <td>{{$ip->cerita}}</td>
                            <td>{{\Carbon\Carbon::parse($ip->tglcek)->format('d-m-Y')}}</td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
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

  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

  <!-- Template Main JS File -->
  <script src="{{url('depan/assets/js/main.js')}}"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/highcharts-3d.js"></script>
  <script src="https://code.highcharts.com/modules/exporting.js"></script>
  <script src="https://code.highcharts.com/modules/export-data.js"></script>
  <script src="https://code.highcharts.com/modules/accessibility.js"></script>
  <script>
    Highcharts.chart('container', {
      chart: {
          type: 'pie',
          options3d: {
              enabled: true,
              alpha: 45,
              beta: 0
          }
      },
      title: {
          text: 'Laporan hasil Well Being, {{$item->nama}}',
          align: 'left'
      },
      subtitle: {
          
      },
      accessibility: {
          point: {
              valueSuffix: '%'
          }
      },
      tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions: {
          pie: {
              allowPointSelect: true,
              cursor: 'pointer',
              depth: 35,
              dataLabels: {
                  enabled: true,
                  format: '{point.name}'
              }
          }
      },
      series: [{
          type: 'pie',
          name: 'Share',
          data: [
              ['Excellent', {{$exc_count}}],
              ['Good', {{$good_count}}],
              ['Medium', {{$medium_count}}],              
              ['Bad', {{$bad_count}}],
              ['Very Bad', {{$vb_count}}]
          ]
      }]
    });
  </script>

</body>

</html>