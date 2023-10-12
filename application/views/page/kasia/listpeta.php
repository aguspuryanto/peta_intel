<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?=@$title; ?></h6>
            </div>
            <div class="card-body p-0">
                <div id='map' style="">
                    <div class="leaflet-top leaflet-right"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<style>
html, body {
    height: 100%;
    margin: 0;
}
#map {
    width: 100%;
    height: 500px;
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

<script type="text/javascript">
    var map = L.map('map').setView(<?=json_encode($listPerkara[0]['geometry']['coordinates'], JSON_NUMERIC_CHECK) ?>, 8);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var listPerkara = <?=json_encode($listPerkara); ?>;
    // var newpopupContent = listPerkara[0]['properties']['name'] + '<br>JUMLAH PERKARA (' + listPerkara.length + ')';
    for(var i=0; i<listPerkara.length; i++){
        var newpopupContent = listPerkara[i]['properties']['popupContent'] + '<br>';
        if(listPerkara[i]['properties']['popupContent']) L.marker(listPerkara[i]['geometry']['coordinates']).addTo(map).bindPopup(newpopupContent).openPopup();
    }
    // L.marker(listPerkara[0]['geometry']['coordinates']).addTo(map).bindPopup(newpopupContent).openPopup();
</script>

<?php
$loadcss = <<<EOF
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
EOF;

$this->load->vars('_css', $loadcss);
// $this->load->vars('_js', $loadjs);