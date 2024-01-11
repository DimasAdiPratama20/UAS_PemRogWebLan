@extends('layout.main')
@section('sidebar')
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link">
      <i class="nav-icon fas fa-tachometer-alt"></i>
      <p>
        Dashboard
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="" class="nav-link">
      <i class="nav-icon far fa-user"></i>
      <p>
        Data Karyawan
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="{{ route('user') }}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Data Akun</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('karyawan') }}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>
            Data Karyawan
          </p>
        </a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a href="{{ route('absensi') }}" class="nav-link">
      <i class="nav-icon fas fa-book"></i>
      <p>
        Data Absensi
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{ route('jabatan') }}" class="nav-link">
      <i class="nav-icon fa-solid fa-suitcase"></i>
      <p>
        Data Jabatan
      </p>
    </a>
  </li>
  <li class="nav-item">
    <a href="{{ route('gaji') }}" class="nav-link">
      <i class="nav-icon fa-solid fa-money-check"></i>
      <p>
        Pengajuan Gaji
        @if (count($notif) > 0)
            <span class="badge badge-info right">{{ count($notif) }}</span>
        @endif
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
            <h1 class="m-0">Absensi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">UBah Data Absensi</li>
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
            <div class="col-6">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Ubah Data Absensi</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form method="POST" action="{{ route('absensi.update', ['id'=>$absensi->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="form-group">
                        <label for="nama">Karyawan</label>
                        <select name="nama" id="nama" class="form-control">
                            @foreach ($dataKaryawan as $dk)
                                <option value="{{ $dk }}" {{ $absensi->nama_karyawan == $dk ? 'selected' : '' }}>{{ $dk }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="bulan">Bulan</label>
                        <select name="bulan" id="bulan" class="form-control">
                            @foreach ($bulan as $b)
                                <option value="{{ $b }}" {{ $absensi->bulan == $b ? 'selected' : '' }}>{{ $b }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <select name="tahun" id="tahun" class="form-control">
                            @for ($i = 2021; $i <= 2050; $i++)
                                <option value="{{ $i }}" {{ $absensi->tahun == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="hadir">Jumlah Hadir</label>
                        <input type="number" name="hadir" id="hadir" class="form-control" value="{{ $absensi->hadir }}">
                      </div>
                      <div class="form-group">
                        <label for="izin">Jumlah Izin</label>
                        <input type="number" name="izin" id="izin" class="form-control" value="{{ $absensi->izin }}">
                      </div>
                      <div class="form-group">
                        <label for="alfa">Jumlah alfa</label>
                        <input type="number" name="alfa" id="alfa" class="form-control" value="{{ $absensi->alfa }}">
                      </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
