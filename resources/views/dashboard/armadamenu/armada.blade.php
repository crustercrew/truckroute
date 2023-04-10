@extends('dashboard.layout.main')

@section('container')

@if (session()->has('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Armada</h1>
      <a href="{{ route('armada.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Data</a>
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data semua Armada</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nama Sopir</th>
                <th>Status</th>
                <th>No Polisi</th>
                <th>No Lambung</th>
                <th>Jenis Kendaraan</th>
                <th>Volume kapasitas</th>
                <th>tahun</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($armada as $arm)
              <tr>
                <th scope="row">{{ $arm->nama_sopir }}</th>
                <td>{{ $arm->status }}</td>
                <td>{{ $arm->no_pol }}</td>
                <td>{{ $arm->no_lambung }}</td>
                <td>{{ $arm->jenis_kendaraan }}</td>
                <td>{{ $arm->volume }}</td>
                <td>{{ $arm->tahun }}</td>
                <td><a class="btn btn-primary" href="{{ route('armada.edit', $arm->id) }}">Edit</button></td>
                <td>
                  <form action="{{ route('armada.destroy', $arm->id) }}" method="POST" onsubmit="return confirm('are you sure you want to delete this ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" >Delete</button>
                  </form>
                  </td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>

@endsection