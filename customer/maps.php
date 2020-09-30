<?php
include 'link.php';
include 'db/db.php';
include 'functions.php';
// include 'topbar.php';
include 'sidebar.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <script src="OpenLayers.js"></script>
<script>
    map = new OpenLayers.Map("demoMap");
    map.addLayer(new OpenLayers.Layer.OSM());
    map.zoomToMaxExtent();
</script> -->
 <div id="googleMap" style="width:100%;height:100vh;"></div>

<script>
function myMap() {
var mapProp= {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:5,
};
var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQ0YX_N45AVW8MA0sqeJ4J6eYCBdibkD8&callback=myMap"></script>
  </div>
  <!-- /.content-wrapper -->
<?php
// include 'footer.php';
?>