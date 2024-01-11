<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cetak Slip Gaji</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ '/lte/plugins/fontawesome-free/css/all.min.css' }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ '/lte/dist/css/adminlte.min.css' }}">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> PT. Kelompok 4
          <small class="float-right">{{ $tanggalHariIni }}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <br>
        <address>
          <strong>Data Karyawan</strong><br>
          Nama : {{ $nama }}<br>
          Jabatan : {{ $jabatan }}<br>
          Periode Gaji : {{ $bulan }} - {{ $tahun }}<br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <br>
        <address>
          <strong>Absensi</strong><br>
          Hadir : {{ $hadir }}<br>
          Izin : {{ $izin }}<br>
          Alfa : {{ $alfa }}<br>
          Total Kehadiran : {{ $total_hadir }}<br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <br>
        <b>No : Rekening</b><br>
        {{ $norek }}
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <br>
    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Total Hadir</th>
            <th>Total Gaji</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            @foreach ($dataTabel as $dt)
                <td>{{ $loop->iteration }}</td>
                <td>{{ $dt->nama }}</td>
                <td>{{ $dt->jabatan }}</td>
                <td>{{ $dt->bulan }}</td>
                <td>{{ $dt->tahun }}</td>
                <td>{{ $dt->total_hadir }}</td>
                <td>{{ $dt->total_gaji }}</td>
            @endforeach
          </tr>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <br>
    <div class="row">
      <!-- /.col -->
      <div class="col-2 ml-auto">
        <p class="lead">Tanggal, {{ $tanggalHariIni }}</p>
        <p><b>Manajer HRD</b></p>
        <br>
        <br>
        <br>
        <p>Tertanda</p>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
