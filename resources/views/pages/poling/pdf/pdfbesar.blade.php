<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <?php
        $logos = storage_path("app/public/assets/gambar/logo.png")
    ?>
    <table class="h-full">
      <tr>
        <td class="h-half-text">
          <img src="{{$logos}}" alt="" style="width: 70px; position: absolute; height: auto">
          <p>
            Hasil Laporan <i>Well Being</i> Semester 2
            <br>
            @if ($siswa->unit === 'SMA')
                SMA Kristen YSKI
            @elseif ($siswa->unit === 'SMP')
                SMP Kristen YSKI
            @elseif ($siswa->unit === 'K3')
                SD Kristen 3 YSKI
            @elseif ($siswa->unit === 'K2')
                SD Kristen 2 YSKI
            @elseif ($siswa->unit === 'K1')
                SD Kristen 1 YSKI
            @else
                Tidak ada
            @endif
            <br>
            Tahun Ajaran 2023/2024
          </p>
        </td>
      </tr>
    </table>
    <div class="identitas">
      <table class="iden-full mb-2">
        <tr>
          <td class="iden-half">
            <div><h6>Nama : {{$siswa->nama}}</h6></div>
            <div><h6>Kelas : {{$siswa->kelas}}</h6></div>
            <div><h6>Tahun Pelajaran : 2023/2024</h6></div>
          </td>
        </tr>
      </table>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Feed</th>
                <th>Kelas</th>
                <th>Cerita</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa->polingdua as $sp)
                <tr>
                    <td>{{$sp->siswa->nama}}</td>
                    <td>{{$sp->feed->nama}}</td>
                    <td>{{$sp->kelas}}</td>
                    <td>{{$sp->cerita}}</td>
                    <td>{{\Carbon\Carbon::parse($sp->tglcek)->format('d-m-Y')}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>