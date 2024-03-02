@extends('layouts.admin')
@section('title')
    Report
@endsection
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="content">
          <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
            <div class="flex-grow-1 mb-1 mb-md-0">
              <h1 class="h3 fw-bold mb-2">
                Table Report
              </h1>
            </div>
          </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- Full Table -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                <h3 class="block-title">Table Report</h3>
                </div>
                <div class="row mt-3 p-3">
                    <div class="col-lg-3">
                        <label for="" style="margin-bottom: 7px; font-weight:bold">Kelas</label>
                        <select class="form-select filter" aria-label="Default select example" id="kelas" name="kelas">
                            <option value="">-- Pilih Kelas / Reset --</option>
                            <option value="X - ALLEGIANT">X - ALLEGIANT</option>
                            <option value="X - BLISSFUL">X - BLISSFUL</option>
                            <option value="X - CARING">X - CARING</option>
                            <option value="X - DELIGHTFUL">X - DELIGHTFUL</option>
                            <option value="X - FEARLESS">X - FEARLESS</option>
                            <option value="X - EXCELENT">X - EXCELENT</option>
                            <option value="XI - ALLEGIANT">XI - ALLEGIANT</option>
                            <option value="XI - BLISSFUL">XI - BLISSFUL</option>
                            <option value="XI - CARING">XI - CARING</option>
                            <option value="XI - DELIGHTFUL">XI - DELIGHTFUL</option>
                            <option value="XI - FEARLESS">XI - FEARLESS</option>
                            <option value="XI - GENUINE">XI - GENUINE</option>
                            <option value="XI - EXCELENT">XI - EXCELENT</option>
                            <option value="XII - ALLEGIANT">XII - ALLEGIANT</option>
                            <option value="XII - BLISSFUL">XII - BLISSFUL</option>
                            <option value="XII - CARING">XII - CARING</option>
                            <option value="XII - DELIGHTFUL">XII - DELIGHTFUL</option>
                            <option value="XII - FEARLESS">XII - FEARLESS</option>
                            <option value="XII - GENUINE">XII - GENUINE</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label for="" style="margin-bottom: 7px; font-weight:bold">Feed</label>
                        <select class="form-select filter" aria-label="Default select example" id="feed" name="feed">
                            <option value="">-- Pilih Feed / Reset --</option>
                            @foreach ($feed as $fd)
                                <option value="{{$fd->nama}}">{{$fd->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <label for="exampleFormControlInput1" class="form-label" style="margin-bottom: 7px; font-weight: bold">Tanggal</label>
                        <input type="text" class="form-control datepicker" id="filter-tanggal" name="tanggal" style="padding: 6px">
                    </div>
                </div>
                <div class="block-content">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter" id="table">
                    <thead>
                        <tr>
                        <th class="text-center" style="width: 100px;">
                            No
                        </th>
                        <th style="width: 30%;">Siswa</th>
                        <th style="width: 15%;">Unit</th>
                        <th style="width: 15%;">Feed</th>
                        <th class="text-center" style="width: 20%;">Kelas</th>
                        <th class="text-center" style="width: 20%;">Cerita</th>
                        <th>Waktu</th>
                        <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    </table>
                </div>
                </div>
            </div>
            <!-- END Full Table -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
    @include('sweetalert::alert')
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/css/bootstrap-datepicker.min.css" integrity="sha512-34s5cpvaNG3BknEWSuOncX28vz97bRI59UnVtEEpFX536A7BtZSJHsDyFoCl8S7Dt2TPzcrCEoHBGeM4SUBDBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
@endpush

@push('addon-script')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js" integrity="sha512-LsnSViqQyaXpD4mBBdRYeP6sRwJiJveh2ZIbW41EBrNmKxgr/LFZIiWT6yr+nycvhvauz8c2nYMhrP80YhG7Cw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        let table = $('#table').DataTable( {
                          processing: true,
                          serverSide: true,
                          ajax: {
                            url: '{{route('ambilDataSMA')}}',
                            data: function(d){
                              d.kelas = $('#kelas').val();
                              d.feed = $('#feed').val();
                              d.tanggal = $('#filter-tanggal').val();
                            }
                          },
                          columns: [
                            {data: "DT_RowIndex", orderable: false, searchable: false},
                            {data: "siswa.nama"},
                            {data: "unit"},
                            {data: "feed.nama"},
                            {data: "kelas"},
                            {data: "cerita"},
                            {data: "waktu"},
                            {data: "tanggal"}
                          ]
                      } );
        $('#filter-tanggal').change(function() {
          table.column(7).search($(this).val()).draw();
        })
        $('#kelas').change(function() {
          table.column(4).search($(this).val()).draw();
        })
        $('#feed').change(function() {
          table.column(3).search($(this).val()).draw();
        })
    </script>
    <script>
        $(function(){
            $(".datepicker").datepicker({
              dateFormat: "dd-mm-yy"
            })
        })
    </script>
@endpush