<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    {{-- BootStrap CSS Online --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

    <script src="https://unpkg.com/feather-icons"></script>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" href="/css/mapping.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
    <link rel="stylesheet" href="css/qgisweb/qgis2web.css" />
    <link rel="stylesheet" href="css/qgisweb/leaflet-search.css" />
    <link rel="stylesheet" href="css/qgisweb/leaflet.fullscreen.css" />

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
                    @yield('isine')
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

    <script src="js/qgisweb/qgis2web_expressions.js"></script>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
    <script src="js/qgisweb/leaflet.rotatedMarker.js"></script>
    <script src="js/qgisweb/leaflet.pattern.js"></script>
    <script src="js/qgisweb/leaflet-hash.js"></script>
    <script src="js/qgisweb/Autolinker.min.js"></script>
    <script src="js/qgisweb/rbush.min.js"></script>
    <script src="js/qgisweb/labelgun.min.js"></script>
    <script src="js/qgisweb/labels.js"></script>
    <script src="js/qgisweb/leaflet-search.js"></script>
    <script src="js/qgisweb/Leaflet.fullscreen.min.js"></script>
    <script src="js/jalur_1.js"></script>
    <script src="/js/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    {{-- BootStrap JavaScript online --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

<!-- Bootstrap core JavaScript-->

<script src="/js/bootstrap/bootstrap.bundle.js"></script>

<!-- Core plugin JavaScript-->
<script src="/js/jquery.easing.js"></script>

<!-- Custom scripts for all pages-->
<script src="/js/sb-admin-2.js"></script>

<!-- Page level plugins -->
<script src="/js/Chart.js"></script>
    <script>

        var highlightLayer;

        function highlightFeature(e) {
            highlightLayer = e.target;

            if (e.target.feature.geometry.type === 'LineString') {
                highlightLayer.setStyle({
                    color: '#ffff00',
                });
            } else {
                highlightLayer.setStyle({
                    fillColor: '#ffff00',
                    fillOpacity: 1
                });
            }
            highlightLayer.openPopup();
        }
        var map = L.map('map', {
            zoomControl: true,
            maxZoom: 28,
            minZoom: 1,
            fullscreenControl: true
        }).fitBounds([
            [-7.3771, 112.6623],
            [-7.5811, 112.7232]
        ]);
        var hash = new L.Hash(map);
        map.attributionControl.setPrefix(
            '<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>'
            );
        var autolinker = new Autolinker({
            truncate: {
                length: 30,
                location: 'smart'
            }
        });
        var bounds_group = new L.featureGroup([]);

        function setBounds() {}
        map.createPane('pane_googlestreets_0');
        map.getPane('pane_googlestreets_0').style.zIndex = 400;
        var layer_googlestreets_0 = L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
            pane: 'pane_googlestreets_0',
            opacity: 1.0,
            attribution: '',
            minZoom: 1,
            maxZoom: 28
        });
        layer_googlestreets_0;
        map.addLayer(layer_googlestreets_0);

        // function pop_jalur_1(feature, layer) {
        //     layer.on({
        //         mouseout: function(e) {
        //             for (i in e.target._eventParents) {
        //                 e.target._eventParents[i].resetStyle(e.target);
        //             }
        //             if (typeof layer.closePopup == 'function') {
        //                 layer.closePopup();
        //             } else {
        //                 layer.eachLayer(function(feature){
        //                     feature.closePopup()
        //                 });
        //             }
        //         },
        //         mouseover: highlightFeature,
        //     });
        // }

        // function style_jalur_1_0() {
        //     return {
        //         pane: 'pane_jalur_1',
        //         opacity: 1,
        //         color: 'rgba(47,21,35,1)',
        //         dashArray: '',
        //         lineCap: 'round',
        //         lineJoin: 'round',
        //         weight: 3.0,
        //         fillOpacity: 0,
        //         interactive: true,
        //     }
        // }
        // map.createPane('pane_jalur_1');
        // map.getPane('pane_jalur_1').style.zIndex = 401;
        // map.getPane('pane_jalur_1').style['mix-blend-mode'] = 'normal';
        // var layer_jalur_1 = new L.geoJson(json_jalur_1, {
        //     attribution: '',
        //     interactive: true,
        //     dataVar: 'json_jalur_1',
        //     layerName: 'layer_jalur_1',
        //     pane: 'pane_jalur_1',
        //     onEachFeature: pop_jalur_1,
        //     style: style_jalur_1_0,
        // });
        // bounds_group.addLayer(layer_jalur_1);
        // map.addLayer(layer_jalur_1);

        //pembuatan icon
        var tps = L.icon({
            iconUrl: '/img/markers2.png',
            iconSize: [25, 25] // size of the icon
        });

        var home = L.icon({
            iconUrl: '/img/homee.png',
            iconSize: [25, 25]
        })

        var tpa = L.icon({
            iconUrl: '/img/tpa.png',
            iconSize: [25, 25]
        })

        //deskripsi lokasi pool
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


        var tpapopup = '<table>\
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


        // data lokasi
        var data = [
            <?php foreach($locations as $key => $value){ ?> {
                "id": "<?= $value->id ?>",
                "loc": [<?= $value->latitude ?>, <?= $value->longtitude ?>],
                "nama_tps": "<?= $value->nama_tempat ?>",
                "kecamatan": "<?= $value->Kecamatan ?>"
            },
            <?php } ?>
        ];

        var markersLayer = new L.LayerGroup(); //layer contain searched elements

        map.addLayer(markersLayer);

        var controlSearch = new L.Control.Search({
            layer: markersLayer,
            initial: false,
            hideMarkerOnCollapse: true,
            zoom: 14
        });

        map.addControl(controlSearch);

        ////////////populate map with markers from sample data
        for (i in data) {
            var nama_tps = data[i].nama_tps, //value searched
                loc = data[i].loc, //position found
                dlhk = L.marker(L.latLng(-7.432484, 112.727690), {
                    title: 'Dlhk kota sidoarjo',
                    icon: home
                });
            marker = new L.Marker(new L.latLng(loc), {
                    title: nama_tps,
                    icon: tps
                }),
                TPA = L.marker(L.latLng(-7.5472291, 112.7589947), {
                    title: 'TPA Jabon',
                    icon: tpa
                })
            deskripsi = '<table>\
                        <tr>\
                            <th scope="row">id</th>\
                            <td> ' + data[i].id + ' </td>\
                        </tr>\
                        <tr>\
                            <td colspan="2"><strong>name</strong><br/>' + data[i].nama_tps + '</td>\
                        </tr>\
                        <tr>\
                            <th scope="row">Kecamatan</th>\
                            <td> ' + data[i].kecamatan + ' </td>\
                        </tr>\
                    </table>';
            TPA.bindPopup(tpapopup);
            dlhk.bindPopup(dlhkpopup);
            marker.bindPopup(deskripsi);
            markersLayer.addLayer(marker);
            markersLayer.addLayer(TPA);
            markersLayer.addLayer(dlhk);
        }
        // $.each( locations, function( index, value ){
        // map.addControl(new L.Control.Search({
        //     layer: locations,
        //     initial: false,
        //     hideMarkerOnCollapse: true,
        //     propertyName: value.nama_tempat}));
        // document.getElementsByClassName('search-button')[0].className +=
        //  ' fa fa-binoculars';
        // });
        // }
        let table = new DataTable('#dataTable', {
            // options
        });
    </script>
</body>

</html>
