@extends('layouts.admin')
@section('title')
    Feed
@endsection
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="content">
          <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
            <div class="flex-grow-1 mb-1 mb-md-0">
              <h1 class="h3 fw-bold mb-2">
                Tambah Feed
              </h1>
            </div>
          </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- Basic -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                <h3 class="block-title">Tambah Feed</h3>
                </div>
                <div class="block-content block-content-full">
                <form action="{{route('feed.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row push">
                    <div class="col-lg-8 col-xl-12">
                        <div class="mb-4">
                            <label class="form-label" for="example-text-input">Nama</label>
                            <input type="text" class="form-control" id="example-text-input" name="nama" placeholder="Nama">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="example-file-input">Input Gambar</label>
                            <input class="form-control" type="file" id="example-file-input" name="gambar">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="example-text-input">Status</label>
                            <input type="text" class="form-control" id="example-text-input" name="status" placeholder="Status">
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('feed.index')}}" class="btn btn-secondary">Batal</a>
                        </div>
                    </div>
                    </div>
                </form>
                </div>
            </div>
            <!-- END Basic -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
@endsection

@push('prepend-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endpush

@push('addon-script')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script>
        var datatable = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'number', name: 'number' },
                { data: 'nama', name: 'nama' },
                { data: 'nisn', name: 'nisn' },
                { data: 'kelas', name: 'kelas' },
                {
                    data: 'aksi',
                    name: 'aksi',
                    orderable: false,
                    searcable: false,
                    width: '25%'
                },
            ]
        })
    </script>
    <script>
        new DataTable('#table');
    </script>
@endpush