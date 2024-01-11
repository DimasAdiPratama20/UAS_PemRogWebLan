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
            <h1 class="m-0">Gaji</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Ubah Data Jabatan</li>
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
                    <h3 class="card-title">Ubah Data Jabatan</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form method="POST" action="{{ route('jabatan.update', ['id'=>$data->id]) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                      <div class="form-group">
                        <label for="nama">Nama Jabatan</label>
                        <input type="text" name="jabatan" id="nama" class="form-control" placeholder="Masukan Nama" value="{{ $data->nama_jabatan }}">
                      </div>
                      <div class="form-group">
                        <label for="gaji">Gaji /Hari</label>
                        <input type="number" name="gaji" class="form-control" id="gaji" placeholder="Masukan Nominal" value="{{ $data->nominal_gaji }}">
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
