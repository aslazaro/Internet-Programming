function ourLocation() {
  var myLatlng = new google.maps.LatLng(-36.845196,174.763086);
  var mapOptions = {
    zoom: 6,
    center: myLatlng
  };

  var map = new google.maps.Map(document.getElementById('googleMap'), mapOptions);

  var carVideo = '<iframe width="450" height="220" src="https://www.youtube.com/embed/41kEABEKfoo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>'

  var infowindow = new google.maps.InfoWindow({
  content: carVideo
  });

  var marker = new google.maps.Marker({
  position: myLatlng,
  map: map,
  title: 'SUPERcarRENT'
  });
  google.maps.event.addListener(marker, 'click', function() {
  
  infowindow.open(map,marker);
  });
}

google.maps.event.addDomListener(window, 'load', ourLocation);
    
