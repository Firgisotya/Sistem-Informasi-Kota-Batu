<?php
include "config/koneksi.php"; 
$title = "Peta Kota Batu";
include 'navbar.php';
?>
<html>

<head>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <style>
    .map {
        height: 400px;
        width: 100%;
    }
    </style>
</head>

<body>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info panel-dashboard centered">
                <div class="panel-heading">
                    <h2 class="panel-title"><strong> - PETA KOTA BATU - </strong></h2>
                </div>
                <div class="panel-body">
                    <div class="map-responsive">
                        <div class="map" id="map"></div>
                        <script type="text/javascript">
                        var mymap = L.map('map', {
                            zoomControl: false
                        }).setView([-7.8806559, 112.5047944], 13);

                        L.tileLayer(
                            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                                maxZoom: 18,
                                attribution: 'Map data © OpenStreetMap contributors.',
                                id: 'mapbox/streets-v11',
                                tileSize: 512,
                                zoomOffset: -1
                            }).addTo(mymap);
                        var wisata = L.icon({
                            iconUrl: 'images/markerIcon/1.png',
                            iconSize: [40, 45], // size of the icon
                        });
                        var hotel = L.icon({
                            iconUrl: 'images/markerIcon/2.png',
                            iconSize: [40, 45], // size of the icon
                        });

                        //wisata
                        <?php 
                                $query = mysqli_query($conn, "SELECT * FROM wisata");
                                while($dt = mysqli_fetch_array($query)){
                            ?>
                        L.marker([<?= $dt['latitude']; ?>, <?= $dt['longtitude']; ?>], {
                            icon: wisata
                        }).bindPopup(
                            '<?= $dt['nm_wisata']; ?> <br> <?= $dt['alamat']; ?>').addTo(mymap);
                        <?php } ?>
                        //hotel
                        <?php 
                                $query = mysqli_query($conn, "SELECT * FROM hotel");
                                while($dt = mysqli_fetch_array($query)){
                            ?>
                        L.marker([<?= $dt['latitude']; ?>, <?= $dt['longtitude']; ?>], {
                            icon: hotel
                        }).bindPopup(
                            '<?= $dt['nm_hotel']; ?> <br> <?= $dt['alamat']; ?>').addTo(mymap);
                        <?php } ?>
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

<?php include 'footer.php'; ?>

</html>