@extends('dashboard.layout.peta.mainall')

@section('container')

@if (session()->has('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Proses Rute Menggunakan Algoritma BFS</h1>
      <!-- <a href="{{ route('penentuanroute.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Data</a> -->
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        @foreach ($judul as $judulah)    
        <h6 class="m-0 font-weight-bold text-primary">Tampilan Data Hasil rute berdasarkan tanggal {{ $judulah->tanggal }}</h6>
        @endforeach
    </div>
    <div class="card-body">

      <div class="mb-3">
      
        <a data-toggle="modal" href="#tampilarmada" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-truck fa-sm text-white-50"></i> tampilkan armada</a>
        <a data-toggle="modal" href="#tampilarmadatanggal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-calendar-check fa-sm text-white-50"></i> tampilkan per-tanggal</a>
        <a data-toggle="modal" href="#tampilsemua" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-list fa-sm text-white-50"></i> tampilkan semua </a>
      </div>

      <div class="col-12 mb-4">
        <div id="mymap"></div>
        </div>

      <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Tanggal Pengambilan</th>
                <th>Supir Armada</th>
                <th>Volume Armada</th>
                <th>Rute Asal</th>
                <th>Rute Tujuan</th>
                <th>Kecamatan Tujuan</th>
                <th>Volume Tujuan</th>
                <th>Jarak</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($findarmada as $arm)
              <tr>
                <th scope="row">{{ $arm->tanggal }}</th>
                <th scope="row">{{ $arm->nama_sopir }}</th>
                <th scope="row">{{ $arm->volume_armada }}</th>
                <td>{{ $arm->asal }}</td>
                <td>{{ $arm->tujuan }}</td>
                <td>{{ $arm->kecamatan_tujuan }}</td>
                <td>{{ $arm->volume }}</td>
                <td>{{ $arm->jarak }} Km</td>
                
              </tr>
              @endforeach
            </tbody>
            <tfoot>
                @foreach ($totaljarak as $total)
                <tr>
                    <td class="right" colspan="6">Total Jarak:</td>
                    <td class="right"></td>
                    <td class="right">{{ $total->total }} KM</td>
                </tr>
                @endforeach
            </tfoot>
          </table>
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
          <form action="/findroutearmada" method="get">
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
          <form action="/findbfs" method="get">
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
          <form action="/findall" method="get">
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