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
                    <div class="col-lg-4">
                        <label for="" style="margin-bottom: 7px; font-weight:bold">Feed Siswa</label>
                        <select class="form-select filter" aria-label="Default select example" id="feed" name="feed" onchange="filter()">
                            <option>-- Pilih Feed --</option>
                            @foreach ($feed as $fd)
                                <option value="{{$fd->nama}}">{{$fd->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="col-lg-4">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div> --}}
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
                        <th style="width: 15%;">Feed</th>
                        <th class="text-center" style="width: 200px;">Kelas</th>
                        <th class="text-center" style="width: 200px;">Cerita</th>
                        <th>Waktu</th>
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
@endpush

@push('addon-script')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        var table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'number', name: 'number' },
                { data: 'nama', name: 'nama' },
                { data: 'feed.nama', name: 'feed.nama', orderable:false },
                { data: 'kelas', name: 'kelas' },
                { data: 'cerita', name: 'cerita' },
                { data: 'waktu', name: 'waktu' },
            ]
        })
    </script>
@endpush