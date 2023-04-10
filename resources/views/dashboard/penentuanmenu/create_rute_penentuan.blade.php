@extends('dashboard.layout.main')

	@section('container')
    <h2> Penentuan Rute Pengangkutan Sampah</h2>
    <hr class="sidebar-divider d-none d-md-block">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah rute Penentuan</h6>
        </div>
        <div class="container p-md-3">
        <form method="post" action="{{URL::to('/')}}/penentuanroute">
        @csrf
            <div class="row g-3 mb-3">
                <div class="col-6">
                    <label for="inputarmada" class="form-label">Pilih Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" required>
                </div>
                <div class="col-6">
                    <label for="inputarmada" class="form-label">Pilih Armada</label>
                        <select class="form-control selectpicker" data-live-search="true" name="armada" id="armada">
                            @foreach ($armada as $arm)
                            <option value="{{ $arm->id }}">armada {{ $arm->no_lambung }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="col-6">
                    <label for="inputlocation" class="form-label">Pilih kecamatan tujuan 1</label><br>
                        <label for="inputlocation" class="form-label">kecamatan 1</label>
                        <select class="form-control selectpicker" name="kecamatan1" id="kecamatan1" data-live-search="true">
                            @foreach ($locations as $loc)
                            <option value="{{ $loc->Kecamatan }}">{{ $loc->Kecamatan }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="col-6">
                    <label for="inputlocation" class="form-label">kecamatan tujuan 2</label><br>
                        <label for="inputlocation" class="form-label">kecamatan 2</label>
                        <select class="form-control selectpicker" name="kecamatan2" id="kecamatan2" data-live-search="true">
                            @foreach ($locations as $loc)
                            <option value="{{ $loc->Kecamatan }}">{{ $loc->Kecamatan }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="col-4">
                    <label for="inputlocation" class="form-label">Pilih batas pengambilan</label>
                        <select class="form-control selectpicker" name="batas" id="batas" data-live-search="true">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                </div>

            </div>
            <button type="submit" class="btn btn-primary">Proses</button>

        </form>
        </div>
    </div>
    @endsection