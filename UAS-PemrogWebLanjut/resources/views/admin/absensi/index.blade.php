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
              <li class="breadcrumb-item active">Absensi</li>
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
            <a href="{{ route('absensi.create') }}" class="btn btn-primary mb-3">Tambah Data Absensi</a>
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Bulan</th>
                      <th>Tahun</th>
                      <th>Hadir</th>
                      <th>Izin</th>
                      <th>Alfa</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->nama_karyawan }}</td>
                            <td>{{ $d->jabatan }}</td>
                            <td>{{ $d->bulan }}</td>
                            <td>{{ $d->tahun }}</td>
                            <td>{{ $d->hadir }}</td>
                            <td>{{ $d->izin }}</td>
                            <td>{{ $d->alfa }}</td>
                            <td>
                                <a href="{{ route('absensi.edit', ['id'=>$d->id]) }}" class="btn btn-primary"><i class="fa fa-pen"></i> Edit</a>
                                <a data-toggle="modal" data-target="#modal-hapus{{ $d->id }}" class="btn btn-danger"><i class="fa fa-trash-alt"></i> Delete</a>
                            </td>
                        </tr>
                        <div class="modal fade" id="modal-hapus{{ $d->id }}">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Hapus Data Absensi</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <p>Apakah kamu yakin untuk menghapus data absensi <b>{{ $d->nama_karyawan }}</b> ? </p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <form action="{{ route('absensi.delete', ['id' => $d->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Ya, Hapus Data</button>
                                  </form>
                                </div>
                              </div>
                              <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                          </div>
                          <!-- /.modal -->
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Bulan</th>
                      <th>Tahun</th>
                      <th>Hadir</th>
                      <th>Izin</th>
                      <th>Alfa</th>
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
