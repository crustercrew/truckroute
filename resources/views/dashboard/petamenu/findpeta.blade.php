@extends('dashboard.layout.peta.main')

@section('container')

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

    <div class="row">
        <div class="col-12 mb-2">
              <div id="map"></div>
        </div>

              <div class="col-12 mb-4">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>no lambung armada</th>
                          <th>Rute asal</th>
                          <th>Rute tujuan</th>
                          <th>jarak</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($findarmada as $armada)
                        <tr>
                          <th scope="row">{{ $armada->no_lambung }}</th>
                          <td>{{ $armada->asal }}</td>
                          <td>{{ $armada->tujuan }}</td>
                          <td>{{ $armada->jarak }} KM</td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        @foreach ($totaljarak as $total)
                        <tr>
                            <td class="right" colspan="3">Total Jarak:</td>
                            <td class="right">{{ $total->total }} KM</td>
                        @endforeach
                        </tr>
                    </tfoot>
                    </table>
                    <br>
                    
                </div>
              </div>
    </div>

    </div>
  </div>

@endsection