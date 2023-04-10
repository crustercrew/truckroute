@extends('dashboard.layout.tps.main')

	@section('isine')

	  <!-- Page Heading -->
	  <div class="d-sm-flex align-items-center justify-content-between">
		<h1 class="h3 mb-0 text-gray-800" style="text-align: center">Data Lokasi</h1>
	  </div>
	  <img>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Graph Lokasi TPS Kabupaten sidoarjo</h6>
		</div>
		<div class="card-body">

					<div id="map"></div>	
		</div>
	</div>

	<div class="card shadow mb-3">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary text-capitalize">data lokasi tps sidoarjo</h6>
		</div>
		<div class="card-body">
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
				  <tr>
					<th>nama Lokasi TPS</th>
					<th>Kecamatan</th>
					<th>volume TPS</th>
				  </tr>
				</thead>
				<tbody>
					@foreach ($locations as $location)
				  <tr>
					<th scope="row">{{ $location->nama_tempat }}</th>
					<td>{{ $location->Kecamatan }}</td>
					<td>{{ $location->volume }}</td>
				  </tr>
				  @endforeach
				</tbody>
			  </table>
		</div>
	</div>

	@endsection