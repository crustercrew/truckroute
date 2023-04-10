        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon ">
                    <i class="fas fa-warehouse"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ $name }}</div>
            </a>
  
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
  
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
  
            <!-- Divider -->
            <hr class="sidebar-divider">
  
            <!-- Heading -->
            <div class="sidebar-heading">
                data lokasi dan armada
            </div>
  
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="/Tps">
                    <i class="fas fa-fw fa-map-marked-alt"></i>
                    <span>Lokasi Tps </span></a>
            </li>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/armada">
                    <i class="fas fa-fw fa-truck"></i>
                    <span>Data Armada truck</span></a>
            </li>
  
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
  
            <div class="sidebar-heading">
              rute pengangkutan sampah
          </div>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/penentuanroute">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Penentuan Rute truck</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/route">
                    <i class="fas fa-fw fa-route"></i>
                    <span>proses Rute truck</span></a>
            </li>
              <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/peta">
                    <i class="fas fa-map"></i>
                    <span>Peta Rute truck</span></a>
            </li>
        </ul>
        <!-- End of Sidebar -->