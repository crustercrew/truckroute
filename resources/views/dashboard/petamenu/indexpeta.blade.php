@extends('dashboard.layout.tps.main')

@section('isine')

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Peta Rute Armada Truck</h1>
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tampilan Peta Hasil Rute</h6>
    </div>
    <div class="card-body">

      <form method="get" action="/findpeta">
        <div class="align-items-center d-sm-flex">
              <div class="col-2 mb-3">
                <div class="form-floating">
                  <select class="form-select" id="armada" name="armada" aria-label="armada label select">
                        @foreach ($armada as $truck)
                        <option value="{{ $truck->no_lambung }}"> {{ $truck->no_lambung }}</option>
                        @endforeach
                  </select>
                  <label for="inputarmada">Pilih Armada</label>
                </div>
              </div>
                      <div class="col-2 mb-3">
                      <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">Tampilkan</button>
                    </div>
        </div>
    </form>

    <div id="map">
    </div>	

    </div>
  </div>

@endsection