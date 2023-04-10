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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.css" rel="stylesheet">

    <script src="https://unpkg.com/feather-icons"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script> --}}
    <link href="/css/mapping.css" rel="stylesheet">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
    integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
    crossorigin=""/>
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

       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
       <script src="/js/jquery.js"></script>
       <script src="/js/bootstrap/bootstrap.bundle.js"></script>
   
       <!-- Core plugin JavaScript-->
       <script src="/js/jquery.easing.js"></script>
   
       <!-- Custom scripts for all pages-->
       <script src="/js/sb-admin-2.js"></script>
   
               <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

       <!-- Page level plugins -->
       <script src="/js/Chart.js"></script>

       <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
       integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
       crossorigin=""></script>

  <script>

function initMap() {
            var findlocation = @json($findlocation);///importing from database to json
      
        var map = L.map('mymap', {
            zoomControl:true, maxZoom:28, minZoom:1,
        }).fitBounds([[-7.3771,112.6623],[-7.5811,112.7232]]);

         L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            opacity: 1.0,
            attribution: '',
            minZoom: 1,
            maxZoom: 28,
            minNativeZoom: 0,
            maxNativeZoom: 18
        }).addTo(map);

        var tps = L.icon({
                iconUrl: '/img/markers2.png',
                iconSize:     [25, 25] // size of the icon
            });

        var home = L.icon({
                iconUrl: '/img/homee.png',
                iconSize: [25,25]
        })

        var tpa = L.icon({
                iconUrl: '/img/tpa.png',
                iconSize: [25,25]
        })

        const waypts = [L.latLng(-7.432484,112.727690)];


        var dlhkpopup = '<table>\
                    <tr>\
                        <th scope="row">id</th>\
                        <td> 1 </td>\
                    </tr>\
                    <tr>\
                        <td colspan="2"><strong>name</strong><br/>Dlhk kota sidoarjo</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">kecamatan</th>\
                        <td> buduran </td>\
                    </tr>\
                </table>';


        var dlhk = L.marker(L.latLng(-7.432484,112.727690),{icon: home}).addTo(map).bindPopup(dlhkpopup); 

        $.each( findlocation, function( index, value ){
          waypts.push(L.latLng(value.latitude2 , value.longtitude2));

          var popupmarker = '<table>\
                    <tr>\
                        <th scope="row">id</th>\
                        <td>' + value.id_tujuan + '</td>\
                    </tr>\
                    <tr>\
                        <td colspan="2"><strong>name</strong><br />' + value.tujuan + '</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">kecamatan</th>\
                        <td>' + value.kec_tujuan + '</td>\
                    </tr>\
                </table>';

          var marker = L.marker(L.latLng(value.latitude2,value.longtitude2),{icon:tps}).addTo(map);
                marker.bindPopup(popupmarker);
      });
      waypts.push(L.latLng(-7.5472291,112.7589947));
      var polyline = L.polyline(waypts, {color: 'blue'}).addTo(map);

      var TPA = '<table>\
                    <tr>\
                        <th scope="row">id</th>\
                        <td> 97 </td>\
                    </tr>\
                    <tr>\
                        <td colspan="2"><strong>name</strong><br/>TPA Jabon</td>\
                    </tr>\
                    <tr>\
                        <th scope="row">kecamatan</th>\
                        <td> Jabon </td>\
                    </tr>\
                </table>';


        var TPA = L.marker(L.latLng(-7.5472291,112.7589947),{icon: tpa}).addTo(map).bindPopup(TPA); 

      //   L.latLng(-7.5472291,112.7589947)
    }

  </script>
	 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k&callback=initMap&v=weekly"async></script>
  	
</html>