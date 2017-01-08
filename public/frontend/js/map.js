//google Map
  function initMap() {
        var coordinates = {lat: 16.075583, lng: 108.153732};

        // Create a map object and specify the DOM element for display.
        var map = new google.maps.Map(document.getElementById('googleMap'), {
          center: coordinates,
          scrollwheel: false,
          zoom: 15
        });

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
          map: map,
          position: coordinates,
          title: 'My position'
        });
    }