<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.css" rel="stylesheet">

    <script src="https://unpkg.com/feather-icons"></script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k&callback=initMap&v=weekly"async></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
    <link href="/css/index.css" rel="stylesheet">

</head>
<body>


  <!-- Page Wrapper -->
  <div id="wrapper">    
    @include('dashboard.layout.sidebar')


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">

          @include('dashboard.layout.header')

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @yield('container')
            </div>

            
          </div>
          
        </div>

        <footer class="sticky-footer bg-white">
          <div class="container my-auto">
              <div class="copyright text-center my-auto">
                  <span>Copyright &copy; {{ $name }}</span>
              </div>
          </div>
      </footer>

  </div>

</body>
       <!-- Bootstrap core JavaScript-->
       <script src="/js/jquery.js"></script>
       <script src="/js/bootstrap/bootstrap.bundle.js"></script>
   
       <!-- Core plugin JavaScript-->
       <script src="/js/jquery.easing.js"></script>
   
       <!-- Custom scripts for all pages-->
       <script src="/js/sb-admin-2.js"></script>
   
       <!-- Page level plugins -->
       <script src="/js/Chart.js"></script>
        

<script type="text/javascript">

    var locations = <?php print_r(json_encode($locations)) ?>;

    var mymap = new GMaps({
      el: '#mymap',
      lat: -7.472613,
      lng: 112.667542,
      zoom:12
    });

    $.each( locations, function( index, value ){
	    mymap.addMarker({
	      lat: value.latitude,
	      lng: value.longtitude,
	      title: value.nama_tempat,
		  infoWindow: {
  			content: 'Nama Tempat :'+value.nama_tempat+' kecamatan : '+value.Kecamatan+' Kabupaten Sidoarjo.'
			}
	    });
   });
  </script>

</html>