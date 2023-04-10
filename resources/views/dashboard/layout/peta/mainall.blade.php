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
            var armada1 = @json($armada1);///importing from database to json
            var armada2 = @json($armada2);///importing from database to json
            var armada3 = @json($armada3);///importing from database to json
            var armada4 = @json($armada4);///importing from database to json
            var armada5 = @json($armada5);///importing from database to json
            var armada6 = @json($armada6);///importing from database to json
            var armada7 = @json($armada7);///importing from database to json
            var armada8 = @json($armada8);///importing from database to json
            var armada9 = @json($armada9);///importing from database to json
            var armada10 = @json($armada10);///importing from database to json
            var armada11 = @json($armada11);///importing from database to json
            var armada12 = @json($armada12);///importing from database to json
            var armada13 = @json($armada13);///importing from database to json
            var armada14 = @json($armada14);///importing from database to json
            var armada15 = @json($armada15);///importing from database to json
            var armada16 = @json($armada16);///importing from database to json
            var armada17 = @json($armada17);///importing from database to json
            var armada18 = @json($armada18);///importing from database to json
            var armada19 = @json($armada19);///importing from database to json
            var armada20 = @json($armada20);///importing from database to json
            var armada21 = @json($armada21);///importing from database to json
            var armada22 = @json($armada22);///importing from database to json
            var armada23 = @json($armada23);///importing from database to json
            var armada24 = @json($armada24);///importing from database to json
            var armada25 = @json($armada25);///importing from database to json
            var armada26 = @json($armada26);///importing from database to json
            var armada27 = @json($armada27);///importing from database to json
            var armada28 = @json($armada28);///importing from database to json
            var armada29 = @json($armada29);///importing from database to json
            var armada30 = @json($armada30);///importing from database to json
      
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

        const alir1 = [L.latLng(-7.432484,112.727690)];
        const alir2 = [L.latLng(-7.432484,112.727690)];
        const alir3 = [L.latLng(-7.432484,112.727690)];
        const alir4 = [L.latLng(-7.432484,112.727690)];
        const alir5 = [L.latLng(-7.432484,112.727690)];
        const alir6 = [L.latLng(-7.432484,112.727690)];
        const alir7 = [L.latLng(-7.432484,112.727690)];
        const alir8 = [L.latLng(-7.432484,112.727690)];
        const alir9 = [L.latLng(-7.432484,112.727690)];
        const alir10 = [L.latLng(-7.432484,112.727690)];
        const alir11 = [L.latLng(-7.432484,112.727690)];
        const alir12 = [L.latLng(-7.432484,112.727690)];
        const alir13 = [L.latLng(-7.432484,112.727690)];
        const alir14 = [L.latLng(-7.432484,112.727690)];
        const alir15 = [L.latLng(-7.432484,112.727690)];
        const alir16 = [L.latLng(-7.432484,112.727690)];
        const alir17 = [L.latLng(-7.432484,112.727690)];
        const alir18 = [L.latLng(-7.432484,112.727690)];
        const alir19 = [L.latLng(-7.432484,112.727690)];
        const alir20 = [L.latLng(-7.432484,112.727690)];
        const alir21 = [L.latLng(-7.432484,112.727690)];
        const alir22 = [L.latLng(-7.432484,112.727690)];
        const alir23 = [L.latLng(-7.432484,112.727690)];
        const alir24 = [L.latLng(-7.432484,112.727690)];
        const alir25 = [L.latLng(-7.432484,112.727690)];
        const alir26 = [L.latLng(-7.432484,112.727690)];
        const alir27 = [L.latLng(-7.432484,112.727690)];
        const alir28 = [L.latLng(-7.432484,112.727690)];
        const alir29 = [L.latLng(-7.432484,112.727690)];
        const alir30 = [L.latLng(-7.432484,112.727690)];

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

        // data lokasi
        var data = [
                <?php foreach($locations as $key => $value){ ?>
                    {"id":"<?= $value->id ?>", "loc":[<?= $value->latitude ?>,<?= $value->longtitude ?>], "nama_tps":"<?= $value->nama_tempat ?>","kecamatan":"<?= $value->Kecamatan ?>"},
                <?php } ?>
        ];

        var markersLayer = new L.LayerGroup();	//layer contain searched elements
        
        map.addLayer(markersLayer);
        
        for(i in data) {
            var nama_tps = data[i].nama_tps,	//value searched
                loc = data[i].loc,		//position found
                marker = new L.Marker(new L.latLng(loc), {title: nama_tps, icon: tps}),
                deskripsi = '<table>\
                        <tr>\
                            <th scope="row">id</th>\
                            <td> '+data[i].id+' </td>\
                        </tr>\
                        <tr>\
                            <td colspan="2"><strong>name</strong><br/>'+data[i].nama_tps+'</td>\
                        </tr>\
                        <tr>\
                            <th scope="row">Kecamatan</th>\
                            <td> '+data[i].kecamatan+' </td>\
                        </tr>\
                    </table>';
            marker.bindPopup(deskripsi);
            markersLayer.addLayer(marker);
        }

        // tampilan armada 1
        $.each( armada1, function( index, value ){
            alir1.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir1.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir1, {color: 'blue'}).addTo(map);

        // tampilan armada 2
        $.each( armada2, function( index, value ){
            alir2.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir2.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir2, {color: '#6600cc'}).addTo(map);

        // tampilan armada 3
        $.each( armada3, function( index, value ){
            alir3.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir3.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir3, {color: '#6600ff'}).addTo(map);

        // tampilan armada 4
        $.each( armada4, function( index, value ){
            alir4.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir4.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir4, {color: '#4d88ff'}).addTo(map);

        // tampilan armada 5
        $.each( armada5, function( index, value ){
            alir5.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir5.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir5, {color: '#003366'}).addTo(map);            

        // tampilan armada 6
        $.each( armada6, function( index, value ){
            alir6.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir6.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir6, {color: '#669999'}).addTo(map); 

        // tampilan armada 7
        $.each( armada7, function( index, value ){
            alir7.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir7.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir7, {color: '#339966'}).addTo(map); 
    
        // tampilan armada 8
        $.each( armada8, function( index, value ){
            alir8.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir8.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir8, {color: '#006600'}).addTo(map); 

        // tampilan armada 9
        $.each( armada9, function( index, value ){
            alir9.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir9.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir9, {color: '#33ff33'}).addTo(map); 

        // tampilan armada 10
        $.each( armada10, function( index, value ){
            alir10.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir10.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir10, {color: '#ffff4d'}).addTo(map); 
 
        // tampilan armada 11
        $.each( armada11, function( index, value ){
            alir11.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir11.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir11, {color: '#cccc00'}).addTo(map); 

        // tampilan armada 12
        $.each( armada12, function( index, value ){
            alir12.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir12.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir12, {color: '#4d4d00'}).addTo(map); 

        // tampilan armada 13
        $.each( armada13, function( index, value ){
            alir13.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir13.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir13, {color: '#ff8c1a'}).addTo(map); 

        // tampilan armada 14
        $.each( armada14, function( index, value ){
            alir14.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir14.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir14, {color: '#994d00'}).addTo(map); 
    
        // tampilan armada 15
        $.each( armada15, function( index, value ){
            alir15.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir15.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir15, {color: '#ffa64d'}).addTo(map); 

        // tampilan armada 16
        $.each( armada16, function( index, value ){
            alir16.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir16.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir16, {color: '#cc6600'}).addTo(map); 

        // tampilan armada 17
        $.each( armada17, function( index, value ){
            alir17.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir17.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir17, {color: '#994d00'}).addTo(map); 

        // tampilan armada 18
        $.each( armada18, function( index, value ){
            alir18.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir18.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir18, {color: '#ff4d4d'}).addTo(map); 

        // tampilan armada 19
        $.each( armada19, function( index, value ){
            alir19.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir19.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir19, {color: '#ff0000'}).addTo(map); 

        // tampilan armada 20
        $.each( armada20, function( index, value ){
            alir20.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir20.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir20, {color: '#b30000'}).addTo(map); 

        // tampilan armada 21
        $.each( armada21, function( index, value ){
            alir21.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir21.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir21, {color: '#d98cb3'}).addTo(map); 

        // tampilan armada 22
        $.each( armada22, function( index, value ){
            alir22.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir22.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir22, {color: '#990099'}).addTo(map); 

        // tampilan armada 23
        $.each( armada23, function( index, value ){
            alir23.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir23.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir23, {color: '#e600e6'}).addTo(map); 

        // tampilan armada 24
        $.each( armada24, function( index, value ){
            alir24.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir24.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir24, {color: '#4d004d'}).addTo(map); 

        // tampilan armada 25
        $.each( armada25, function( index, value ){
            alir25.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir25.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir25, {color: '#ffb3ff'}).addTo(map);
            
        // tampilan armada 26
        $.each( armada26, function( index, value ){
            alir26.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir26.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir26, {color: '#000099'}).addTo(map); 
        
        // tampilan armada 27
        $.each( armada27, function( index, value ){
            alir27.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir27.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir27, {color: '#00004d'}).addTo(map); 

        // tampilan armada 28
        $.each( armada28, function( index, value ){
            alir28.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir28.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir28, {color: '#1a1aff'}).addTo(map);

        // tampilan armada 29
        $.each( armada29, function( index, value ){
            alir29.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir29.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir29, {color: '#9999ff'}).addTo(map); 

        // tampilan armada 30
        $.each( armada30, function( index, value ){
            alir30.push(L.latLng(value.latitude2 , value.longtitude2));
        });
            alir30.push(L.latLng(-7.5472291,112.7589947));
            var polyline = L.polyline(alir30, {color: '#00bfff'}).addTo(map); 


        }


        
  </script>
	 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1MgLuZuyqR_OGY3ob3M52N46TDBRI_9k&callback=initMap&v=weekly"async></script>
  	
</html>