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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" /><link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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
          <li><a class="nav-link scrollto" href="{{route('polingReportKecil')}}" style="margin-right: 20px">Report</a></li>
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
        <div class="mb-3">
          <div class="form-group">
            <div class="row">
              <div class="col-lg-4">
                <label for="exampleFormControlSelect1" style="margin-bottom: 5px; font-weight: bold">Sort By Name</label>
                <select class="form-control nama" name="nama" id="nama">
                  <option value="">-- Pilih Nama --</option>
                  @foreach ($siswa as $sw)
                    <option value="{{$sw->nama}}">{{$sw->nama}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-lg-4 date">
                  <label for="exampleFormControlSelect1" style="margin-bottom: 5px; font-weight: bold; margin-top: 0px">Sort By Date</label>
                  <div id="daterange" class="float-end" style="background: #fff; cursor: pointer; padding: 6px 10px; border: 1px solid #ccc; width: 100%; text-align: center; border-radius: 6px">
                      <i class="fa fa-calender"></i>&nbsp;
                      <span></span> 
                      <i class="fa fa-caret-down"></i>
                  </div>
              </div>
            </div>
          </div>
        </div>
        <h3>Report Feedback</h3>
        <div class="block-content">
            <div class="table-responsive mt-4">
              <table class="table table-bordered table-striped table-vcenter text-center" id="table">
                <thead>
                  <tr>
                    <th class="text-center" style="width: 5%;">No</th>
                    <th class="text-center" style="width: 20%;">Nama</th>
                    <th class="text-center" style="width: 10%;">Feedback</th>
                    <th class="text-center" style="width: 20%;">Cerita</th>
                    <th class="text-center" style="width: 5%;">Kelas</th>
                    <th class="text-center" style="width: 15%;">Waktu</th>
                    <th class="text-center" style="width: 15%;">Tanggal</th>
                    <th class="text-center" style="width: 20%;">Aksi</th>
                  </tr>
                </thead>
                <tbody></tbody>
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
    <script>
      
    </script>
    {{-- <script>
        var datatable = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'number', name: 'number' },
                { data: 'siswa.nama', name: 'siswa.nama' },
                { data: 'feed.nama', name: 'feed.nama' },
                { data: 'cerita', name: 'cerita' },
                { data: 'kelas', name: 'kelas' },
                { data: 'waktu', name: 'waktu' },
            ]
        })

        $('#feed').change(function() {
          datatable.column(3).search($(this).val()).draw();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#table').DataTable();
        });
    </script> --}}
    <script>
    var start_date = moment().subtract(1, 'M');
      
      var end_date = moment();
      
      $(".date #daterange span").html(start_date.format('DD-MM-YYYY') + ' - ' + end_date.format('DD-MM-YYYY'));
      
      $(".date #daterange").daterangepicker({
          startDate : start_date,
          endDate : end_date
      }, function(start_date, end_date) {
          $(".date #daterange span").html(start_date.format('DD-MM-YYYY') + ' - ' + end_date.format('DD-MM-YYYY'));
          
          table.draw();
      })

    let table = $('#table').DataTable( {
                      processing: true,
                      serverSide: true,
                      ajax: {
                        url: '{{route('ambildata')}}',
                        data: function(d){
                          d.feed_id = $('#feed').val();
                          d.start_date = $('#daterange').data("daterangepicker").startDate.format('YYYY-MM-DD');
                          d.end_date = $('#daterange').data('daterangepicker').endDate.format('YYYY-MM-DD');
                        }
                      },
                      columns: [
                        {data: "DT_RowIndex", orderable: false, searchable: false},
                        {data: "siswa.nama"},
                        {data: "feed.nama"},
                        {data: "cerita"},
                        {data: "kelas"},
                        {data: "waktu"},
                        {data: "tanggal"},
                        {data: "aksi", orderable: false, searchable: false},
                      ]
                  } );
      $('#nama').change(function() {
        table.column(1).search($(this).val()).draw();
      })
    </script>
    <script>
      $(function(){
          $(".datepicker").datepicker({
            dateFormat: "dd-mm-yy"
          })
      })
    </script>

  <!-- Template Main JS File -->
  <script src="{{url('depan/assets/js/main.js')}}"></script>

</body>

</html>
