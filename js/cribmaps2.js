$('#cribmap-container').gmap().bind('init', function() { 
  $.getJSON( 'webservice.php', function(data) { 
    $.each( data, function() {
    $.each( data.markers, function(i, value) {
      $('#cribmap-container').gmap('addMarker', { 
        'position': new google.maps.LatLng(value.crib.ubicacioncrib), 
        'bounds': true 
      }).click(function() {
        $('#map_canvas').gmap('openInfoWindow', { '<div style="width:200px;" id="content"><a style="font-weight:bold; font-size: 1em;" href="#"><h1 style="font-weight:bold; font-size: 1em;" id="firstHeading" class="firstHeading">Departamento en Altabrisa con 2 cuartos</h1></a><div id="bodyContent"><img style="max-width:200px;" src="img/cribs/property-218_5.jpg"></div>': marker.content }, this);
      });
    });
  });
});
});