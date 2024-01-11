@extends('layout.main')
@section('sidebar')
<li class="nav-item">
    <a href="{{ route('home.biasa') }}" class="nav-link">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Dashboard
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{ route('karyawan.gaji') }}" class="nav-link">
      <i class="nav-icon fas fa-money-check"></i>
      <p>
        Pengajuan Gaji
      </p>
    </a>
  </li>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pengajuan Gaji</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pengajuan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <a href="{{ route('karyawan.gaji.create') }}" class="btn btn-primary mb-3">Tambah Pengajuan Gaji</a>
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example3" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Bulan</th>
                      <th>Tahun</th>
                      <th>Total Hari</th>
                      <th>Total Gaji</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->nama}}</td>
                            <td>{{ $d->jabatan }}</td>
                            <td>{{ $d->bulan }}</td>
                            <td>{{ $d->tahun }}</td>
                            <td>{{ $d->total_hadir }}</td>
                            <td>{{ $d->total_gaji }}</td>
                            <td>{{ $d->status }}</td>
                            <td>
                                @if ($d->status == 'Di Setujui')
                                    <a href="{{ route('karyawan.gaji.cetak', ['id' => $d->id]) }}" class="btn btn-success"><i class="fa fa-pen"></i> Cetak</a>
                                @elseif ($d->status == 'Di Proses')
                                    <p>Menunggu persetujuan admin</p>
                                @else
                                    <p>Pengajuan Gaji di Tolak</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Bulan</th>
                      <th>Tahun</th>
                      <th>Total Hari</th>
                      <th>Total Gaji</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
