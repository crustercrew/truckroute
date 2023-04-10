@extends('dashboard.layout.main')
 
@section('container')

<div class="d-sm-flex align-items-center justify-content-between mb-4 border-bottom">
    <h1 class="h2">Welcome, {{ auth()->user()->name }}</h1>
</div>

  <div class="row">
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                              <div class="card border-left-primary shadow h-100 py-2">
                                  <a href="/Tps" class="card-body active">
                                      <div class="row no-gutters align-items-center">
                                          <div class="col mr-2">
                                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                  Lokasi TPS</div>
                                          </div>
                                          <div class="col-auto">
                                              <i class="fas fa-map-marked-alt fa-2x text-gray-300"></i>
                                          </div>
                                      </div>
                                  </a>
                              </div>
                          </div>
  
                          <!-- Earnings (Monthly) Card Example -->
                          <div class="col-xl-3 col-md-6 mb-4">
                              <div class="card border-left-success shadow h-100 py-2">
                                  <a href="/armada" class="card-body">
                                      <div class="row no-gutters align-items-center">
                                          <div class="col mr-2">
                                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                  Data Armada Truck</div>  
                                          </div>
                                          <div class="col-auto">
                                              <i class="fas fa-truck fa-2x text-gray-300"></i>
                                          </div>
                                      </div>
                                    </a>
                              </div>
                          </div>
  
                          <!-- Earnings (Monthly) Card Example -->
                          <div class="col-xl-3 col-md-6 mb-4">
                              <div class="card border-left-info shadow h-100 py-2">
                                  <a href="/penentuanroute" class="card-body">
                                      <div class="row no-gutters align-items-center">
                                          <div class="col mr-2">
                                              <div class="text-xs font-weight-bold text-info text-uppercase mb-1"> Penentuan Rute Truck
                                              </div>
                                          </div>
                                          <div class="col-auto">
                                              <i class="fas fa-map-marker-alt fa-2x text-gray-300"></i>
                                          </div>
                                      </div>
                                  </a>
                                  </div>
                              </div>
                          
                          <!-- Pending Requests Card Example -->
                          <div class="col-xl-3 col-md-6 mb-4">
                              <div class="card border-left-warning shadow h-100 py-2">
                                  <a href="/route" class="card-body">
                                      <div class="row no-gutters align-items-center">
                                          <div class="col mr-2">
                                              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                  Proses Rute Truck</div>
                                          </div>
                                          <div class="col-auto">
                                              <i class="fas fa-fw fa-route fa-2x text-gray-300"></i>
                                          </div>
                                      </div>
                                  </a>
                                  </div>
                              </div>
                                                        <!-- Pending Requests Card Example -->
                          <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-dark shadow h-100 py-2">
                                <a href="/peta" class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Peta Rute Truck</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-map fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </a>
                                </div>
                            </div>
  </div>

@endsection