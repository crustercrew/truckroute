@extends('dashboard.layout.rute.main')

@section('container')

@if (session()->has('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Data Rute</h1>
    <div class="align-items-center d-sm-flex">
      <div class="mb-3">
        <a href="{{ route('penentuanroute.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Data</a>
        
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#hapusmodal"><i class="fas fa-trash fa-sm text-white-50"></i>
          Hapus Data
        </button>
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

      <div class="col-12 mb-4">
        <div id="map"></div>
        </div>

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
                @foreach ($findarmada as $arm)
              <tr>
                
              <th scope="row">{{ $arm->tanggal }}</th>
                <th scope="row">{{ $arm->no_lambung }}</th>
                <td>{{ $arm->nama_tempat }}</td>
                <td>{{ $arm->volume }}</td>
                <td>{{ $arm->kecamatan }}</td>
                <td>{{ $arm->status }}</td>
                <!-- <td><a class="btn btn-primary" href="{{ route('penentuanroute.edit', $arm->id) }}">Edit</button></td>
                <td>
                  <form action="{{ route('penentuanroute.destroy', $arm->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                  </td> -->
              </tr>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>

<!-- Hapus Modal -->
<div class="modal fade" id="hapusmodal" tabindex="-1" role="dialog" aria-labelledby="hapusmodalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusmodalLabel">hapus data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="mb-3 align-items-center ">
          <a data-toggle="modal" href="#myModal1" class="btn btn-danger">hapus armada</a>
          <a data-toggle="modal" href="#myModal2" class="btn btn-danger">hapus armada per-tanggal</a>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#" data-dismiss="modal" class="btn btn-primary">Close</a>
      </div>
    </div>
  </div>
</div>
 {{-- modal hapus armada --}}
<div class="modal" id="myModal1" data-backdrop="static">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">hapus armada</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div><div class="container"></div>
        <div class="modal-body">
          <form action="/destroy" method="delete" onsubmit="return confirm('are you sure you want to delete this ?')">
            @csrf
            <div class="row g-3 mb-3">
              <div class="col-12">
                  <label for="inputarmada" class="form-label">Pilih Armada</label>
                      <select class="form-control selectpicker" data-live-search="true" name="armada" id="armada">
                          @foreach ($armada as $arm)
                          <option value="{{ $arm->id }}">armada {{ $arm->no_lambung }}</option>
                          @endforeach
                      </select>
              </div>
            </div>
          
        </div>
        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn">Close</a>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
        </form>
    </div>
  </div>
</div>
 {{-- modal hapus armada pertanggal --}}
 <div class="modal" id="myModal2" data-backdrop="static">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">hapus armada per-tanggal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div><div class="container"></div>
        <div class="modal-body">
          <form action="/destroypertanggal" method="delete" onsubmit="return confirm('are you sure you want to delete this ?')">
            @csrf
            <div class="row g-3 mb-3">
              <div class="col-6">
                  <label for="inputarmada" class="form-label">Pilih Armada</label>
                      <select class="form-control selectpicker" data-live-search="true" name="armada" id="armada">
                          @foreach ($armada as $arm)
                          <option value="{{ $arm->id }}">armada {{ $arm->no_lambung }}</option>
                          @endforeach
                      </select>
              </div>
              <div class="col-6">
                  <label for="inputarmada" class="form-label">Pilih tanggal yang dihapus</label>
                  <input type="date" class="form-control" name="tanggal" id="tanggal" required>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn">Close</a>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
        </form>
      </div>
  </div>
</div>
 {{-- modal tampilkan armada --}}
 <div class="modal" id="tampilarmada" data-backdrop="static">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">tampilkan armada</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div><div class="container"></div>
        <div class="modal-body">
          <form action="/findarmada" method="get">
            @csrf
            <div class="row g-3 mb-3">
              <div class="col-12">
                  <label for="inputarmada" class="form-label">Pilih Armada yang ingin ditampilkan</label>
                      <select class="form-control selectpicker" data-live-search="true" name="armada" id="armada">
                          @foreach ($armada as $arm)
                          <option value="{{ $arm->id }}">armada {{ $arm->no_lambung }}</option>
                          @endforeach
                      </select>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn">Close</a>
          <button type="submit" class="btn btn-primary">tampilkan</button>
        </div>
        </form>
      </div>
  </div>
</div>
 {{-- modal tampilkan armada pertanggal --}}
 <div class="modal" id="tampilarmadatanggal" data-backdrop="static">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">tampilkan armada per-tanggal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div><div class="container"></div>
        <div class="modal-body">
          <form action="/find" method="get">
            @csrf
            <div class="row g-3 mb-3">
              <div class="col-6">
                  <label for="inputarmada" class="form-label">Pilih Armada yang ingin ditampilkan</label>
                      <select class="form-control selectpicker" data-live-search="true" name="armada" id="armada">
                          @foreach ($armada as $arm)
                          <option value="{{ $arm->id }}">armada {{ $arm->no_lambung }}</option>
                          @endforeach
                      </select>
              </div>
              <div class="col-6">
                <label for="inputarmada" class="form-label">Pilih tanggal yang ingin ditampilkan</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                    </select>
            </div>
            </div>
        </div>
        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn">Close</a>
          <button type="submit" class="btn btn-primary">tampilkan</button>
        </div>
        </form>
      </div>
  </div>
</div>
 {{-- modal tampilkan semua armada pertanggal --}}
 <div class="modal" id="tampilsemua" data-backdrop="static">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">tampilkan semua armada per-tanggal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div><div class="container"></div>
        <div class="modal-body">
          <form action="/tanggal" method="get">
            @csrf
            <div class="row g-3 mb-3">
              <div class="col-12">
                <label for="inputarmada" class="form-label">Pilih tanggal yang ingin ditampilkan</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                    </select>
            </div>
            </div>
        </div>
        <div class="modal-footer">
          <a href="#" data-dismiss="modal" class="btn">Close</a>
          <button type="submit" class="btn btn-primary">tampilkan</button>
        </div>
        </form>
      </div>
  </div>
</div>
@endsection