

<!DOCTYPE html>
<html>
<head>

  <title>KEJARI BANDAR LAMPUNG</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
  <style>
    html, body {
      height: 100%;
      margin: 0;
    }
    #map {
      width: 100%;
      height:  100%;
    }
  .info { padding: 6px 8px; font: 14px/16px Arial, Helvetica, sans-serif; background: white; background: rgba(255,255,255,0.8); box-shadow: 0 0 15px rgba(0,0,0,0.2); border-radius: 5px; } .info h4 { margin: 0 0 5px; color: #777; }
  .legend { text-align: left; line-height: 18px; color: #555; }
  .legend i { width: 18px; height: 18px; float: left; margin-right: 8px; opacity: 0.7; }

  .myButton {
	background-color:#44c767;
	-moz-border-radius:28px;
	-webkit-border-radius:28px;
	border-radius:28px;
	border:1px solid #18ab29;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:16px 31px;
	text-decoration:none;
	text-shadow:0px 1px 0px #2f6627;
}
.myButton:hover {
	background-color:#5cbf2a;
}
.myButton:active {
	position:relative;
	top:1px;
}



</style>
</head>
    <body>
    <div id='map'>
      <div class="leaflet-top leaflet-right">
      </div>
    </div>
    </body>

    <script type="text/javascript" src="<?=base_url('assets/');?>js/icon.js"></script>
    <!-- <script type="text/javascript" src="<?=base_url('assets/');?>js/kecamatan.js"></script> -->

    <script type="text/javascript">

        var map = L.map('map').setView(<?=json_encode($listLatLong['coordinates']) ?>, 12);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 19,
          attribution: 'Kejari Bandar Lampung'
        }).addTo(map);

        function style(feature) {
          return {
            weight: 1,
            opacity: 1,
            color: 'white',
            dashArray: '3',
            fillOpacity: 0.5,
            fillColor: "green",
            border: 3
          };
        }

        var someFeatures = <?=json_encode($listGeoJson) ?>;
        var geojson;
        geojson = L.geoJson(someFeatures, {
          style: style,
          filter: function(feature, layer) {
            return feature.properties.show_on_map;
          }
        }).addTo(map);

        
        var legend = L.control({position: 'bottomleft'});
        legend.onAdd = function (map) {
          var div = L.DomUtil.create('div', 'info legend'),
            grades = [0, 10, 20, 50, 100, 200, 500, 1000],
            labels = [],
            from, to;

            labels.push('<img src="<?=base_url('assets/');?>icon/legend_penyelamatan_keuangan_negara.jpg">');
            div.innerHTML = labels.join('<br>');
            return div;
        };

      legend.addTo(map);
    </script>
  </html>
