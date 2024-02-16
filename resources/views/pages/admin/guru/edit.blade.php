@extends('layouts.admin')
@section('title')
    Guru
@endsection
@section('content')
    <!-- Main Container -->
    <main id="main-container">
        <!-- Hero -->
        <div class="content">
          <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
            <div class="flex-grow-1 mb-1 mb-md-0">
              <h1 class="h3 fw-bold mb-2">
                Edit Guru
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
                <h3 class="block-title">Edit Guru</h3>
                </div>
                <div class="block-content block-content-full">
                <form action="{{route('guru.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row push">
                    <div class="col-lg-8 col-xl-12">
                        <div class="mb-4">
                        <label class="form-label" for="example-text-input">Nama</label>
                        <input type="text" class="form-control" id="example-text-input" name="nama" placeholder="Nama" value="{{$item->nama}}">
                        </div>
                        <div class="mb-4">
                        <label class="form-label" for="example-email-input">Email</label>
                        <input type="text" class="form-control" id="example-email-input" name="email" placeholder="Email" value="{{$item->email}}">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="example-select">Unit</label>
                            <select class="form-select" id="example-select" name="unit">
                              <option selected="">-- Pilih Unit --</option>
                              <option value="K1" @if($item->unit == 'K1') selected @endif>K1</option>
                              <option value="K2" @if($item->unit == 'K2') selected @endif>K2</option>
                              <option value="K3" @if($item->unit == 'K3') selected @endif>K3</option>
                              <option value="SMP" @if($item->unit == 'SMP') selected @endif>SMP</option>
                              <option value="SMA" @if($item->unit == 'SMA') selected @endif>SMA</option>
                            </select>
                        </div>
                        <div class="mb-4">
                        <label class="form-label" for="example-password-input">Kelas</label>
                        <input type="text" class="form-control" id="example-password-input" name="kelas" placeholder="Kelas" value="{{$item->kelas}}">
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                            <a href="{{route('guru.index')}}" class="btn btn-secondary">Batal</a>
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