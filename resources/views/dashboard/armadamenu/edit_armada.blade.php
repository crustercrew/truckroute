@extends('dashboard.layout.main')

@section('container')

<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary">Edit Data Armada :</h5>
  </div>
<div class="container p-md-3">
  <form method="post" action="{{ route('armada.update',$armada->id) }}" >
    @csrf
    @method('PUT')
    <div class="row g-3 mb-3">
    <div class="col-12">
      <label for="inputarmada" class="form-label">Nama Sopir</label>
      <input type="text" class="form-control @error('nama_sopir') is-invalid @enderror" id="nama" value="{{ $armada->nama_sopir }}" name="nama_sopir" placeholder="Nama Supir baru">
      @error('nama_sopir')
      <div class="invalid-feedback">
      {{ $message }}
        </div>  
      @enderror  
    </div>
      <div class="col-6">
        <label for="inputarmada" class="form-label">Status</label>
        <input type="text" class="form-control @error('status') is-invalid @enderror" value="{{ $armada->status }}" name="status" placeholder="status kepegawaian" >
        @error('status')
        <div class="invalid-feedback">
        {{ $message }}
          </div>  
        @enderror  
      </div>
      <div class="col-6">
        <label for="inputarmada" class="form-label">Nomor Polisi</label>
        <input type="text" class="form-control @error('no_pol') is-invalid @enderror" value="{{ $armada->no_pol }}" name="no_pol" placeholder="Nomor Polisi">
        @error('no_pol')
        <div class="invalid-feedback">
        {{ $message }}
          </div>  
        @enderror  
      </div>
    <div class="col-4">
      <label for="status" class="form-label">No Lambung</label>
      <input type="text" class="form-control @error('no_lambung') is-invalid @enderror" value="{{ $armada->no_lambung }}" id="no_lambung" name="no_lambung" placeholder="No Lambung">
      @error('no_lambung')
      <div class="invalid-feedback">
      {{ $message }}
        </div>  
      @enderror  
    </div>
    <div class="col-4">
      <label for="status" class="form-label">Jenis Kendaraan</label>
      <select class="form-control @error('jenis_kendaraan') is-invalid @enderror selectpicker" name="jenis_kendaraan" id="jenis_kendaraan" data-live-search="true">
        <option value="Dump truck">Dump truck</option>
      </select>
      @error('jenis_kendaraan')
      <div class="invalid-feedback">
      {{ $message }}
        </div>  
      @enderror  
    </div>
    <div class="col-2">
      <label for="status" class="form-label">volume kapasitas truk</label>
      <select class="form-control @error('volume') is-invalid @enderror selectpicker" name="volume" id="volume" data-live-search="true">
          <option value="6">6</option>
          <option value="8">8</option>
          <option value="10">10</option>
          <option value="12">12</option>
          <option value="14">14</option>
          <option value="16">16</option>
      </select>
      @error('volume')
      <div class="invalid-feedback">
      {{ $message }}
        </div>  
      @enderror  
    </div>
    <div class="col-2">
      <label for="status" class="form-label">Tahun</label>
      <input type="text" class="form-control @error('tahun') is-invalid @enderror" value="{{ $armada->tahun }}" id="tahun" name="tahun" placeholder="Tahun">
      @error('tahun')
      <div class="invalid-feedback">
      {{ $message }}
        </div>  
      @enderror  
    </div>
  </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    
  </form>

  </div>
</div>


@endsection