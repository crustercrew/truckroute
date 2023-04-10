@extends('dashboard.layout.rute.main')

@section('container')

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Data Rute</h1>
    <div class="align-items-center d-sm-flex">
      <div class="mb-3">
        <a href="{{ route('penentuanroute.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Data</a>
      </div>
    </div>
  </div>
  
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data semua Rute</h6>
    </div>
    <div class="card-body">

      <div class="mb-3">
        <a data-toggle="modal" href="#tampilarmada" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-truck fa-sm text-white-50"></i> tampilkan armada</a>
        <a data-toggle="modal" href="#tampilarmadatanggal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-calendar-check fa-sm text-white-50"></i> tampilkan per-tanggal</a>
        <a data-toggle="modal" href="#tampilsemua" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white-50"></i> tampilkan semua </a>
      </div>

      <div class="row">
      <div class="col-12 mb-4">
      <div id="map"></div>
      </div>

    <div class="col-12 mb-4">
      <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Tanggal Pengambilan</th>
                <th>No Lambung Armada</th>
                <th>Rute Tujuan</th>
                <th>Volume Tujuan m3</th>
                <th>kecamatan Tujuan</th>
                <th>status lokasi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($findarmada as $armada)
              <tr>
                <th scope="row">{{ $armada->tanggal }}</th>
                <th scope="row">{{ $armada->no_lambung }}</th>
                <td>{{ $armada->nama_tempat }}</td>
                <td>{{ $armada->volume }}</td>
                <td>{{ $armada->kecamatan }}</td>
                <td>{{ $armada->status }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </div>

    </div>
  </div>
    
  </div>
</div>


@endsection